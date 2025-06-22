<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Strategy Configurations
    |--------------------------------------------------------------------------
    |
    | This file contains mappings of strategy identifiers to their implementing
    | classes. This allows for easy registration of new strategies without
    | modifying the service provider code.
    |
    */

    'weather' => [
        'openweather' => \App\Services\Weather\Strategies\OpenWeatherStrategy::class,
        // Add new weather strategies here
    ],
];
