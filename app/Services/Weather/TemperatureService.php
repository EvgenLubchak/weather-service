<?php

namespace App\Services\Weather;

use App\Models\Temperature;
use App\ValueObjects\Location;
use App\ValueObjects\TemperatureCelsius;

class TemperatureService
{
    public function __construct(
        private readonly TemperatureProviderInterface $provider,
    ) {}

    public function storeTemperature(Location $location): Temperature
    {
        $temperature = $this->fetchTemperature($location);

        return Temperature::create([
            'temperature_celsius' => $temperature->temperatureCelsius,
            'timestamp' => now(config('weather.time_zone')),
        ]);
    }

    private function fetchTemperature(Location $location): TemperatureCelsius
    {
        return $this->provider->getCurrentTemperatureCelsius($location);
    }
}
