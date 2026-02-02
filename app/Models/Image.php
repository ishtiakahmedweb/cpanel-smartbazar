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
            // encoding logic
            $encodedPath = Str::of($this->path)
                ->dirname()
                ->append('/')
                ->append(rawurlencode(Str::of($this->path)->basename()));

            // Fix: Check physical existence in storage/app/public
            // DB contains '/storage/foo.jpg', we need 'foo.jpg' relative to storage root
            $relativePath = Str::after($this->path, '/storage/');
            
            if (file_exists(storage_path('app/public/' . $relativePath))) {
                return asset($encodedPath);
            }

            // Fallback for missing files or external sources
            if ($this->source_id) {
                 return config('app.oninda_url').$encodedPath;
            }
            
            // Final fallback (even if missing locally, return asset link for rewrite rules to handle)
            return asset($encodedPath);
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
