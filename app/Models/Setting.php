<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'name', 'value',
    ];

    #[\Override]
    public static function booted(): void
    {
        static::saved(function ($setting): void {
            // Store ONLY the value in cache, as the setting() helper expects
            cacheMemo()->put('settings:'.$setting->name, $setting->value);
            Cache::forget('settings');
        });
    }

    public static function array()
    {
        return cacheMemo()->rememberForever('settings', fn () => self::all()->flatMap(fn ($setting): array => [$setting->name => $setting->value])->toArray());
    }

    protected function value(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (is_null($value)) return null;
                $decoded = json_decode((string) $value, false);
                return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $value;
            },
            set: function ($value) {
                // If it's an array, we might want to merge, but let's keep it simple for now
                // to avoid the recursive loop from the previous implementation
                return json_encode($value);
            },
        );
    }
}
