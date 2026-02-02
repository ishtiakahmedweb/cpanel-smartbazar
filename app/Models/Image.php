<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    protected $appends = ['size_human'];

    protected $fillable = [
        'filename', 'disk', 'path', 'extension', 'mime', 'size',
    ];

    #[\Override]
    public static function booted(): void
    {
        static::saved(function ($image): void {
            // Dispatch job to copy image to reseller databases
            if (isOninda() && $image->wasRecentlyCreated) {
                dispatch(new \App\Jobs\CopyResourceToResellers($image));
            }
        });

        static::deleting(function ($image): void {
            // throw_if(isReseller() && $image->source_id !== null, \Exception::class, 'Cannot delete a resource that has been sourced.');

            // Dispatch job to remove image from reseller databases
            if (isOninda()) {
                dispatch(new \App\Jobs\RemoveResourceFromResellers($image->getTable(), $image->id));
            }
        });
    }

    protected function sizeHuman(): Attribute
    {
        $bytes = $this->size;
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $bytes /= 1024, $i++);

        return Attribute::get(fn (): string => round($bytes, 2).' '.$units[$i]);
    }

    protected function src(): Attribute
    {
        return Attribute::get(function () {
            // encoding logic
            $encodedPath = Str::of($this->path)
                ->dirname()
                ->append('/')
                ->append(rawurlencode(Str::of($this->path)->basename()));

            // Check if file exists in 'storage' folder (since we use the symbolic link)
            // path is '19-Jan-2026/foo.jpg', so we check 'public/storage/19-Jan-2026/foo.jpg'
            if (file_exists(public_path('storage/' . $this->path))) {
                return asset('storage/' . $encodedPath);
            }

            // Fallback to original logic if not found in storage
            if ($this->source_id || ! file_exists(public_path($this->path))) {
                 // return config('app.oninda_url').$encodedPath;
                 // safer fallback for this specific user who has the files locally
                 return asset('storage/' . $encodedPath);
            }
            
            return asset($encodedPath);
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
