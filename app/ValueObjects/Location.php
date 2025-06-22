<?php

namespace App\ValueObjects;

readonly class Location
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public ?string $city = null
    ) {
        if ($latitude < -90 || $latitude > 90) {
            throw new \InvalidArgumentException("Invalid latitude");
        }

        if ($longitude < -180 || $longitude > 180) {
            throw new \InvalidArgumentException("Invalid longitude");
        }
    }
}
