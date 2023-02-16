<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;

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

        if (!Collection::hasMacro('paginate')) {

            Collection::macro(
                'paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage),
                        $this->count(),
                        $perPage,
                        $page,
                        $options
                    ))
                        ->withPath('');
                }
            );
        }

        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'sbk925f42wn7jvxr',
                    'publicKey' => 'kbd74z8txzfh39nd',
                    'privateKey' => 'd1fe97016638cf1d0f55bd503b801740'
                ]
            );
        });
    }
}
