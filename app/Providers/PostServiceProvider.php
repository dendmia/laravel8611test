<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Blog\Post\Repository\PostRepositoryInterface;
use App\Infrastructure\Blog\Post\Repository\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
