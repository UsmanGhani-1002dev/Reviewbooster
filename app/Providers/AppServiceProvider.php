<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

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
        // Override config values from database settings
        if (Schema::hasTable('settings')) {
            $settings = Setting::all()->pluck('value', 'key');
            
            if ($settings->has('stripe_key')) {
                config(['services.stripe.key' => $settings['stripe_key']]);
            }
            if ($settings->has('stripe_secret')) {
                config(['services.stripe.secret' => $settings['stripe_secret']]);
            }
            if ($settings->has('google_places_api_key')) {
                config(['services.google.maps_api_key' => $settings['google_places_api_key']]);
            }
        }

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();

                $showSubscriptionWarning = $user->shouldShowSubscriptionNotification();
                $subscriptionExpired = $user->hasExpiredSubscription();
                $subscriptionExpiresIn2Days = $user->subscriptionExpiresIn48Hours();
                $timeLeft = $user->getTimeLeftForExpiry();

                $view->with(compact('showSubscriptionWarning', 'subscriptionExpired', 'subscriptionExpiresIn2Days', 'timeLeft'));
            }
        });
    }
}
