<?php

namespace App\ValueObjects;

readonly class TemperatureCelsius
{
    public function __construct(
        public float $temperatureCelsius,
    )
    {
        if ($temperatureCelsius < -70 || $temperatureCelsius > 70) {
            throw new \InvalidArgumentException("Invalid temperature");
        }
    }
}
