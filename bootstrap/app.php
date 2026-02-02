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
            
            // 🔒 Strict Admin Routing: Force admin routes on subdomain
            Route::middleware('web')
            ->domain($adminDomain)
                ->group(function() {
                    Route::get('fix-storage', function() {
                        $publicStorage = public_path('storage');
                        
                        // If it's a real directory and NOT a link, we must remove it first!
                        if (file_exists($publicStorage) && !is_link($publicStorage)) {
                            \Illuminate\Support\Facades\File::deleteDirectory($publicStorage);
                            $msg = "Deleted real 'storage' folder. ";
                        } else {
                            $msg = "";
                        }
                        
                        \Illuminate\Support\Facades\Artisan::call('storage:link');
                        
                        $check = is_link($publicStorage) ? 'Link Created Successfully!' : 'FAIL: Could not create link.';
                        return $msg . $check . "<br>Target: " . (is_link($publicStorage) ? readlink($publicStorage) : 'N/A');
                    });
                    
                    require base_path('routes/admin.php');
                });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\EnsureSpaResponse::class,
        ]);

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'response.cache' => CacheResponse::class,
            'doNotCacheResponse' => \Spatie\ResponseCache\Middlewares\DoNotCacheResponse::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (\Illuminate\Database\QueryException $e, Request $request) {
            // If the database is down or failing for any reason, show a friendly 503 page instead of 500
            return response()->view('errors.503', [], 503);
        });

        $exceptions->render(function (\PDOException $e, Request $request) {
            // Catch low-level PDO exceptions (like connection refused) and show 503
            return response()->view('errors.503', [], 503);
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
$app->usePublicPath(__DIR__ . '/../../public_html');

return $app;
