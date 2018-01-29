<?php

namespace Viviniko\Country;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Viviniko\Country\Console\Commands\CountryTableCommand;
use Viviniko\Country\Console\CountrySeedCommand;

class AddressServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/country.php' => config_path('country.php'),
        ]);

        // Register commands
        $this->commands('command.country.table');
        $this->commands('command.country.seed');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/country.php', 'country');

        $this->registerRepositories();

        $this->registerCountryService();

        $this->registerCommands();
    }

    public function registerRepositories()
    {
        $this->app->singleton(
            \Viviniko\Address\Repositories\Country\CountryRepository::class,
            \Viviniko\Address\Repositories\Country\EloquentCountry::class
        );
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.country.table', function ($app) {
            return new CountryTableCommand($app['files'], $app['composer']);
        });

        $this->app->singleton('command.country.seed', CountrySeedCommand::class);
    }

    /**
     * Register the favorite service provider.
     *
     * @return void
     */
    protected function registerCountryService()
    {
        $this->app->singleton(
            \Viviniko\Country\Contracts\CountryService::class,
            \Viviniko\Country\Services\CountryServiceImpl::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \Viviniko\Country\Contracts\CountryService::class
        ];
    }
}