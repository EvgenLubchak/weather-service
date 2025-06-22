<?php

namespace App\Services\Weather\Strategies;

use App\ValueObjects\Location;
use App\Services\Weather\TemperatureProviderInterface;
use App\ValueObjects\TemperatureCelsius;
use Illuminate\Support\Facades\Http;

class OpenWeatherStrategy implements TemperatureProviderInterface
{
    /**
     * @param Location $location
     * @return TemperatureCelsius
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function getCurrentTemperatureCelsius(Location $location): TemperatureCelsius
    {
        $response = Http::get(config('weather.providers.openweather.api_url'), [
            'lat' => $location->latitude,
            'lon' => $location->longitude,
            'exclude' => 'minutely,hourly,daily,alerts',
            'appid' => config('weather.providers.openweather.api_key'),
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return new TemperatureCelsius($response->json('current.temp'));
        }

        throw new \Exception("OpenWeather API error: " . $response->body());
    }
}
