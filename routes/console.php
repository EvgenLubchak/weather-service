<?php

use App\Services\Weather\TemperatureService;
use App\ValueObjects\Location;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('fetch:temperature', function (TemperatureService $temperatureService) {
    $location = new Location(
        latitude: config('weather.latitude'),
        longitude: config('weather.longitude'),
        city: config('weather.city'),
    );
    $record = $temperatureService->storeTemperature($location);
    $this->info("Temperature recorded: {$record->temperature_celsius}°C");
})->hourly();
