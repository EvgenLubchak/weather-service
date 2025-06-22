<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherHistoryController;
use App\Http\Middleware\VerifyRequestToken;;

Route::get('weather-history', [WeatherHistoryController::class, 'weatherHistory'])
    ->middleware(['throttle:10,1', VerifyRequestToken::class]);
