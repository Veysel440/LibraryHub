<?php

namespace App\Providers;

use App\Models\Menu;
use App\Services\AboutService;
use App\Services\BookService;
use App\Services\CommunicationService;
use App\Services\ContactService;
use App\Services\Contracts\AboutServiceInterface;
use App\Services\Contracts\BookServiceInterface;
use App\Services\Contracts\CommunicationServiceInterface;
use App\Services\Contracts\ContactServiceInterface;
use App\Services\Contracts\MenuServiceInterface;
use App\Services\Contracts\SliderServiceInterface;
use App\Services\MenuService;
use App\Services\SliderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(SliderServiceInterface::class, SliderService::class);
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
        $this->app->bind(CommunicationServiceInterface::class, CommunicationService::class);
        $this->app->bind(AboutServiceInterface::class, AboutService::class);
        $this->app->bind(BookServiceInterface::class, BookService::class);
    }


    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('menus', Menu::all());
        });
    }
}
