<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = false;
        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            View::share('app_settings', $setting);
        }
        Passport::routes();
        Passport::loadKeysFrom(storage_path());
        $year = date('Y');
        $running_year = $year . '-' . ($year + 1);
        $running_session = $setting ? $setting->running_year : $running_year;

        config(['running_session' => $running_session]);
    }
}
