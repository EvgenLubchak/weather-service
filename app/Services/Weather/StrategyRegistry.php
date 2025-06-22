<?php

namespace App\Services\Weather;

class StrategyRegistry
{
    /**
     * The registered strategies.
     *
     * @var array<string, string>
     */
    protected static array $strategies = [];

    /**
     * Register a strategy with the registry.
     *
     * @param string $key The strategy identifier
     * @param string $class The fully qualified class name
     * @return void
     */
    public static function register(string $key, string $class): void
    {
        static::$strategies[$key] = $class;
    }

    /**
     * Get a strategy instance by its key.
     *
     * @param string $key
     * @return TemperatureProviderInterface
     * @throws \InvalidArgumentException If the strategy doesn't exist
     */
    public static function make(string $key): TemperatureProviderInterface
    {
        if (!isset(static::$strategies[$key])) {
            throw new \InvalidArgumentException("Unsupported weather provider: {$key}");
        }

        $class = static::$strategies[$key];

        return app()->make($class);
    }

    /**
     * Check if a strategy is registered.
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset(static::$strategies[$key]);
    }

    /**
     * Get all registered strategies.
     *
     * @return array<string, string>
     */
    public static function all(): array
    {
        return static::$strategies;
    }
}
