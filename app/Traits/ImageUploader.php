<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait ImageUploader
{
    protected function uploadImage($file, $arg = [])
    {
        $arg += [
            'dir' => 'images',
            'width' => 250,
            'height' => 66,
        ];
        $path = implode('/', [
            date('d-M-Y'),
            $arg['dir'],
            time(),
        ]).'-'.preg_replace('/\s+/', '-', $file->getClientOriginalName());

        $image = Image::read($file);
        if (data_get($arg, 'resize', true)) {
            $image = $image->{$arg['method'] ?? 'resize'}($arg['width'], $arg['height']);
        }
        
        $encodedImage = (string) $image->encode();
        $isStored = Storage::disk($arg['disk'] ?? 'public')->put($path, $encodedImage);

        if (!$isStored) {
            \Illuminate\Support\Facades\Log::error("Failed to store image on disk: " . json_encode([
                'path' => $path,
                'disk' => $arg['disk'] ?? 'public',
                'size' => strlen($encodedImage)
            ]));
        }

        return Storage::url($path);
    }
}
