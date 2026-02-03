<?php

namespace App\Providers;

use App\Extensions\DatabaseSessionHandler;
use App\Helpers\ImageHelper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSection;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Setting;
use App\Observers\ResponseCacheObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[\Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        Session::extend('custom', function ($app) {
            $table = $app['config']['session.table'];
            $lifetime = $app['config']['session.lifetime'];
            $connection = $app['db']->connection($app['config']['session.connection']);

            return new DatabaseSessionHandler($connection, $table, $lifetime, $app);
        });

        Builder::macro(
            'withWhereHas',
            fn ($relation, $constraint) => $this
                ->whereHas($relation, $constraint)
                ->with([$relation => $constraint])
        );

        $this->app->bind('pathao', fn (): \App\Pathao\Manage\Manage => new \App\Pathao\Manage\Manage(
            new \App\Pathao\Apis\AreaApi,
            new \App\Pathao\Apis\StoreApi,
            new \App\Pathao\Apis\OrderApi
        ));

        $this->app->bind('redx', fn (): \App\Redx\Manage\Manage => new \App\Redx\Manage\Manage(
            new \App\Redx\Apis\AreaApi,
            new \App\Redx\Apis\StoreApi,
            new \App\Redx\Apis\OrderApi
        ));

        collect([
            Brand::class,
            Category::class,
            HomeSection::class,
            Page::class,
            Product::class,
            Slide::class,
            Setting::class,
        ])->each(static function (string $model): void {
            $model::observe(ResponseCacheObserver::class);
        });

        if (! $this->app->runningInConsole()) {
            // 🔒 PERMANENT FIX: Force HTTPS to prevent "Mixed Content Cache Pollution"
            // This ensures assets (CSS/JS) always load over https, even if the request 
            // initially hits the server via http or a proxy.
            \Illuminate\Support\Facades\URL::forceScheme('https');

            \Illuminate\Support\Facades\View::share('logo', setting('logo'));
            \Illuminate\Support\Facades\View::share('company', setting('company'));
        }
    }
}
