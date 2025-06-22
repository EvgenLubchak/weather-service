<?php

namespace App\DTO;

use Carbon\Carbon;

readonly class WeatherHistoryFilterDto
{
    public function __construct(
        public Carbon $day,
    ) {}
}
