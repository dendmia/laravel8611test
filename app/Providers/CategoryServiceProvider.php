<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Blog\Category\Repository\CategoryRepositoryInterface;
use App\Infrastructure\Blog\Category\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
