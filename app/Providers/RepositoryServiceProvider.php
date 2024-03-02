<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private array $bind = [
        CategoryInterface::class => CategoryRepository::class,
        ProductInterface::class => ProductRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach ($this->bind as $key => $value) {
            $this->app->bind($key, $value);
        }
    }
}
