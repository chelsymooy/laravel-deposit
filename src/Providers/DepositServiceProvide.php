<?php

namespace Chelsymooy\Deposit\Providers;

use Illuminate\Support\ServiceProvider;

use Chelsymooy\Deposit\Models\Account;

class DepositServiceProvide extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // REGISTER CONFIG
        $this->publishes([
            __DIR__.'/../../config/deposit.php' => config_path('deposit.php'),
        ]);

        // REGISTER MIGRATION
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        // REGISTER OBSERVER
        \Chelsymooy\Deposit\Models\Account::observe(new \Chelsymooy\Deposit\Observers\AccountGeneratingNo);
        // \Chelsymooy\Deposit\Models\Transaction::observe(new \Chelsymooy\Deposit\Observers\TopUp);
        // \Chelsymooy\Deposit\Models\Transaction::observe(new \Chelsymooy\Deposit\Observers\Pay);
    }
}
