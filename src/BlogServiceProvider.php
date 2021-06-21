<?php

namespace SimaoCoutinho\Blog;

use Illuminate\Support\ServiceProvider;
use SimaoCoutinho\Blog\Components\BlogNavItem;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('SimaoCoutinho\Blog\Controllers\BlogController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewComponentsAs('admin', [
            BlogNavItem::class
        ]);

        $this->loadViewsFrom(__DIR__ . '/views', 'blog');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'blog-migrations');
    }
}
