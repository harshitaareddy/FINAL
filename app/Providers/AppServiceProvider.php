<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('tagify', function ($expression) {

            $expression =  "preg_replace(\"/(?:^|\s)#(\w+)/\", \" <a href='tag/$1'>#$1</a>\", $expression)";
            return "<?php echo {$expression}; ?>";

        });
        Blade::directive('hello', function ($expression) {
            return "<?php echo 'Hello ' . {$expression}; ?>";
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