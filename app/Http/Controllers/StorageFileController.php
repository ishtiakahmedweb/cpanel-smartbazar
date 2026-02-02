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

        if ($disk->exists($path)) {
            return $disk->response($path);
        }

        abort(404);
    }
}
