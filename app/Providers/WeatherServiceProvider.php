<?php

namespace App\Providers;

use App\Services\Weather\StrategyRegistry;
use App\Services\Weather\TemperatureProviderInterface;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register all available strategies from config
        $this->registerStrategiesFromConfig();

        // Register the temperature provider interface
        $this->app->singleton(TemperatureProviderInterface::class, function () {
            $provider = config('weather.provider');
            return StrategyRegistry::make($provider);
        });
    }

    /**
     * Register all available weather strategies from configuration.
     *
     * @return void
     */
    protected function registerStrategiesFromConfig(): void
    {
        // Load strategies from configuration
        $strategies = config('strategies.weather');

        foreach ($strategies as $key => $class) {
            StrategyRegistry::register($key, $class);
        }
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/weather.php' => config_path('weather.php'),
            __DIR__ . '/../../config/strategies.php' => config_path('strategies.php'),
        ]);
    }
}
