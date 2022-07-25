<?php

namespace App\Providers;

use App\Models\TypePayment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        if(Schema::hasTable('type_payments')){
            $typePayments = TypePayment::isActive()->get();

            \View::share('typePayments', $typePayments);
        }
    }
}
