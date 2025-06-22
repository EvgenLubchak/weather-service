<?php

return [
    'city' => env('CITY', 'Kiev'),
    'time_zone' => env('CITY_TIME_ZONE', 'Europe/Kiev'),
    'latitude' => env('CITY_LATITUDE', 50.4501),
    'longitude' => env('CITY_LONGITUDE', 30.5234),
    'provider' => env('WEATHER_PROVIDER', 'openweather'),

    'providers' => [
        'openweather' => [
            'api_url' => env('OPEN_WEATHER_API_URL'),
            'api_key' => env('OPEN_WEATHER_API_KEY'),
        ]
    ]
];
