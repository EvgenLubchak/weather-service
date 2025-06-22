<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherHistoryRequest;
use App\Http\Resources\WeatherHistoryResource;
use App\Services\WeatherHistoryService;
use App\DTO\WeatherHistoryFilterDto;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class WeatherHistoryController extends Controller
{
    public function __construct(
        private readonly WeatherHistoryService $weatherHistoryService,
    ) {}

    /**
     * Handles the weather history request and returns a JSON response
     * containing a collection of weather history resources.
     *
     * @param WeatherHistoryRequest $request The incoming request containing the validated data.
     * @return JsonResponse The JSON response with the weather history data.
     */
    public function weatherHistory(WeatherHistoryRequest $request): JsonResponse
    {
        $dto = new WeatherHistoryFilterDto(day: Carbon::createFromDate($request->validated('day')));

        return response()->json(
            WeatherHistoryResource::collection(
                $this->weatherHistoryService->getWeatherHistory($dto)
            )
        );
    }
}
