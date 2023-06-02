<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
        //Currency Rupiah
        Blade::directive('currency', function ( $expression ) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });

        // Laravel Pagination use Bootstrap
        Paginator::useBootstrap();

        // Connect Helpers
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
