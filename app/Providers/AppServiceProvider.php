<?php

namespace App\Providers;

<<<<<<< Updated upstream
=======
use App\Services\Interfaces\Social;
use App\Services\Interfaces\UploadImage;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadImageService;
>>>>>>> Stashed changes
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
<<<<<<< Updated upstream
        //
=======
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(UploadImage::class, UploadImageService::class);
>>>>>>> Stashed changes
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
