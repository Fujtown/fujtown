<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MenuService;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(MenuService::class, function ($app) {
            return new MenuService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(MenuService $menuService): void
    {
        View::share('menuCategories', $menuService->getMenu());

    }
}
