<?php

namespace SimaoCoutinho\Blog;

use Illuminate\Support\ServiceProvider;
use SimaoCoutinho\Blog\Components\BlogCategories;
use SimaoCoutinho\Blog\Components\BlogFeatured;
use SimaoCoutinho\Blog\Components\BlogMostSeen;
use SimaoCoutinho\Blog\Components\BlogNavItem;
use SimaoCoutinho\Blog\Components\LatestBlog;

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

        $this->loadViewComponentsAs('blog', [
            BlogCategories::class,
            LatestBlog::class,
            BlogMostSeen::class,
            BlogFeatured::class
        ]);
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
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'blog-migrations');
    }
}
