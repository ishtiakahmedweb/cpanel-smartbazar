<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\ResponseCache\Middlewares\CacheResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            $adminDomain = env('ADMIN_DOMAIN', 'camel.smartbazaarbd.xyz');
            
            // ðŸ”’ Strict Admin Routing: Force admin routes on subdomain
            Route::middleware('web')
            ->domain($adminDomain)
                ->group(function() {
                    Route::get('fix-everything', function() {
                        try {
                            // 1. Clear All Caches
                            \Illuminate\Support\Facades\Artisan::call('optimize:clear');
                            $msg = "Caches cleared. ";

                            // 2. Fix Permissions (if possible via PHP)
                            $paths = [storage_path(), base_path('bootstrap/cache')];
                            foreach ($paths as $path) {
                                if (file_exists($path)) {
                                    @chmod($path, 0775);
                                }
                            }

                            // 3. Fix Storage Symlink (Linux/cPanel Optimized)
                            // We use a relative link because absolute paths from Git (Windows) break on Linux.
                            $publicStorage = base_path('public/storage');
                            
                            if (file_exists($publicStorage)) {
                                if (is_link($publicStorage)) {
                                    unlink($publicStorage);
                                } else {
                                    \Illuminate\Support\Facades\File::deleteDirectory($publicStorage);
                                }
                            }

                            if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
                                // Relative: from public/storage point to ../storage/app/public
                                $command = 'ln -s ../storage/app/public ' . escapeshellarg($publicStorage);
                                exec($command, $output, $returnVar);
                                $msg .= ($returnVar === 0) ? "Linux Relative Symlink Created. " : "Symlink failed (Check shell_exec). ";
                            } else {
                                \Illuminate\Support\Facades\Artisan::call('storage:link');
                                $msg .= "Windows Symlink Created. ";
                            }

                            return $msg . "System is ready!";
                        } catch (\Exception $e) {
                            return "Error: " . $e->getMessage();
                        }
                    });

                    Route::get('fix-storage', function() {
                        return redirect('/fix-everything');
                    });
                    
                    require base_path('routes/admin.php');
                });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\EnsureSpaResponse::class,
            \App\Http\Middleware\EnsureGuestId::class,
        ]);

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'response.cache' => CacheResponse::class,
            'doNotCacheResponse' => \Spatie\ResponseCache\Middlewares\DoNotCacheResponse::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            //
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (\Illuminate\Database\QueryException $e, Request $request) {
            // If the database is refused or unreachable, show a friendly 503 page instead of 500
            if (str_contains($e->getMessage(), 'Connection refused') || str_contains($e->getMessage(), '2002')) {
                return response()->view('errors.503', [], 503);
            }
        });

        $exceptions->render(function (\PDOException $e, Request $request) {
            if (str_contains($e->getMessage(), 'Connection refused') || str_contains($e->getMessage(), '2002')) {
                return response()->view('errors.503', [], 503);
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found.',
                ], 404);
            }
        });
    })->create();

/*
|--------------------------------------------------------------------------
| Fix for cPanel Split Folder (backend and public_html)
|--------------------------------------------------------------------------
*/
$publicHtml = __DIR__ . '/../../public_html';
$localPublic = __DIR__ . '/../public';

// On Server (Linux), definitely prioritize public_html if it exists.
// On Windows (Local), prioritize local public.
if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' && file_exists($publicHtml)) {
    $app->usePublicPath($publicHtml);
} elseif (file_exists($localPublic)) {
    $app->usePublicPath($localPublic);
} elseif (file_exists($publicHtml)) {
    $app->usePublicPath($publicHtml);
}

// FORCE THE STORAGE PATH - THIS IS THE FIX
if (file_exists('/home/smartbaz/storage')) {
    $app->useStoragePath('/home/smartbaz/storage');
} 

return $app;
