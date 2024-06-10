<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

        Model::preventLazyLoading(!App::isProduction());

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject(__("Verify Email Address"))
                ->line(__("Please click the button below to verify your email address."))
                ->action(__("Verify Email Address"), $url)
                ->line(__("If you did not create an account, no further action is required."));
        });
        
        App::register(\Barryvdh\DomPDF\ServiceProvider::class);
    }
}
