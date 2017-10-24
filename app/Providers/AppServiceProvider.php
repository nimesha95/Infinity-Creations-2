<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_proid', function ($attribute, $value, $parameters, $validator) {
            if (!empty($value) && substr($value, 0, 2) == "IC") {
                $rest = substr($value, 2);
                if (is_numeric($rest)) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
