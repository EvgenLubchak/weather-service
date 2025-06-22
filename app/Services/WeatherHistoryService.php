<?php

namespace App\Services;

use App\DTO\WeatherHistoryFilterDto;
use App\Models\Temperature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class WeatherHistoryService
{
    private const WEATHER_HISTORY_CACHE_TTL = 604800; // 7 days in seconds

    /**
     * Retrieves weather history data based on the provided filter.
     * Uses caching for past dates.
     *
     * @param WeatherHistoryFilterDto $dto Data transfer object containing filter criteria.
     * @return Collection A collection of weather history data records.
     */
    public function getWeatherHistory(WeatherHistoryFilterDto $dto): Collection
    {
        $isCacheable = $dto->day->isBefore(Carbon::today());

        if ($isCacheable) {
            return Cache::remember(
                'weather-history-' . $dto->day->format('Y-m-d'),
                self::WEATHER_HISTORY_CACHE_TTL,
                fn () => $this->fetchTemperatures($dto)
            );
        }

       return $this->fetchTemperatures($dto);
    }

    public function fetchTemperatures(WeatherHistoryFilterDto $dto): Collection
    {
        $start = Carbon::parse($dto->day)->startOfDay();
        $end = Carbon::parse($dto->day)->endOfDay();

        return Temperature::whereBetween('timestamp', [$start, $end])->get();
    }
}
