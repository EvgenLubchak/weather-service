# Weather Service

Application collects weather statistics hourly by ENV city location parameters.
Then you can get a temperature history for a specific day using endpoint.
Single endpoint information is described in the features.

## Tech Stack

- **Framework:** Laravel v12
- **Database:** PostgreSQL
- **Cache:** Redis

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd weather-app
```

2. Create an environment file:
```bash
cp .env.example .env
```

3. Configure your `.env`:
```env
CITY=Kiev
CITY_TIME_ZONE="Europe/Kiev"
CITY_LATITUDE="50.4504"
CITY_LONGITUDE="30.5245"
WEATHER_PROVIDER=openweather

OPEN_WEATHER_API_URL="https://api.openweathermap.org/data/3.0/onecall"
OPEN_WEATHER_API_KEY=

X_TOKEN="xsx345_dsf45+sdsds55453_sad++2$%"
```

4. Add https://home.openweathermap.org/api_keys API key for openweather provider

5. Start docker environment:
```bash
docker compose up -d
```

6. composer:
```bash
composer install
```

7. Generate application key:
```bash
php artisan key:generate
```

8. Run database migrations:
```bash
php artisan migrate
```

9. After configurations statistics will be collected automatically!

## Features

### Collecting City temperatures hourly
 - Ability to flexibly add different weather providers

### Temperature history endpoint
 - x-token in the request header 
http://localhost:8000/api/weather-history?day=2025-06-21
