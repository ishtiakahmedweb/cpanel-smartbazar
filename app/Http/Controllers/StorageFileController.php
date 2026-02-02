<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StorageFileController extends Controller
{
    public function show($path)
    {
        // Security: Prevent traversal attacks
        if (str_contains($path, '..')) {
            abort(404);
        }

        $disk = Storage::disk('public');

        // Absolute path to the file in the storage directory
        $storagePath = storage_path('app/public/' . $path);

        if (!file_exists($storagePath)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => mime_content_type($storagePath) ?: 'application/octet-stream',
            // 'Content-Disposition' => 'inline; filename="' . basename($storagePath) . '"', // Optional: Force display behavior
        ];

        return response()->file($storagePath, $headers);
    }
}
