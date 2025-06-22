<?php

namespace App\Services\Weather;

use App\ValueObjects\Location;
use App\ValueObjects\TemperatureCelsius;

interface TemperatureProviderInterface
{
    /**
     * Retrieves the current temperature in Celsius for the given location.
     *
     * @param Location $location The location for which the temperature is to be fetched.
     * @return TemperatureCelsius The current temperature in Celsius at the specified location.
     */
    public function getCurrentTemperatureCelsius(Location $location): TemperatureCelsius;
}
