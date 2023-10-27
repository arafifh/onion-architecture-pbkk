<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Modules\Product\Infrastructure\Repository\ProductRepository;
use App\Http\Modules\Product\Domain\Service\RepositoryInterface\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
