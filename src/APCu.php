<?php

namespace APCu;

class APCu
{
    public function __construct()
    {
        if (!extension_loaded("apcu")) throw new APCUException("APCu extension not loaded");
    }

    /**
     * Cache a new variable in the data store
     *
     * @param array|string $key Store the variable using this name. keys are cache-unique, so attempting to use apcu_add() to store data with a key that already exists will not overwrite the existing data, and will instead return false. (This is the only difference between apcu_add() and apcu_store().)
     * @param mixed $var The variable to store
     * @param int $ttl Time To Live; store var in the cache for ttl seconds. After the ttl has passed, the stored variable will be expunged from the cache (on the next request). If no ttl is supplied (or if the ttl is 0), the value will persist until it is removed from the cache manually, or otherwise fails to exist in the cache (clear, restart, etc.).
     * 
     * @return bool
     */
    public function add(array|string $key, mixed $var = null, int $ttl = 0): bool|array
    {
        return apcu_add($key, $var, $ttl);
    }

    /**
     * Retrieves cached information from APCu's data store
     *
     * @param bool $limited If limited is true, the return value will exclude the individual list of cache entries. This is useful when trying to optimize calls for statistics gathering.
     * 
     * @return array|false
     */
    public function cacheInfo(bool $limited = false): array|false
    {
        return apcu_cache_info($limited);
    }

    /**
     * Updates an old value with a new value
     *
     * @param string $key The key of the value being updated.
     * @param int $old The old value (the value currently stored).
     * @param int $new The new value to update to.
     * 
     * @return bool
     */
    public function cas(string $key, int $old, int $new): bool
    {
        return apcu_cas($key, $old, $new);
    }

    /**
     * Clears the APCu cache
     *
     * @return bool
     */
    public function clearCache(): bool
    {
        return apcu_clear_cache();
    }

    /**
     * Decrease a stored number
     *
     * @param string $key The key of the value being decreased.
     * @param int $step The step, or value to decrease.
     * @param bool|null $success Optionally pass the success or fail boolean value to this referenced variable.
     * @param int $ttl TTL to use if the operation inserts a new value (rather than decrementing an existing one).
     * 
     * @return int|false
     */
    public function decrease(string $key, int $step = 1, ?bool $success = null, int $ttl = 0): int|false
    {
        if (is_bool($success)) {
            apcu_dec($key, $step, $success, $ttl);
            return $success;
        }

        return apcu_dec($key, $step, ttl: $ttl);
    }

    /**
     * Removes a stored variable from the cache
     *
     * @param mixed $key A key used to store the value as a string for a single key, or as an array of strings for several keys, or as an APCUIterator object.
     * 
     * @return mixed
     */
    public function delete(mixed $key): mixed
    {
        return apcu_delete($key);
    }

    /**
     * Whether APCu is usable in the current environment
     *
     * @return bool
     */
    public function enabled(): bool
    {
        return apcu_enabled();
    }

    /**
     * Atomically fetch or generate a cache entry
     *
     * @param string $key
     * @param callable $generator
     * @param int $ttl
     * 
     * @return mixed
     */
    public function entry(string $key, callable $generator, int $ttl = 0): mixed
    {
        return apcu_entry($key, $generator, $ttl);
    }

    /**
     * Checks if entry exists
     *
     * @param mixed $keys A string, or an array of strings, that contain keys.
     * 
     * @return mixed
     */
    public function exists(mixed $keys): mixed
    {
        return apcu_exists($keys);
    }

    /**
     * Fetch a stored variable from the cache
     *
     * @param mixed $key The key used to store the value (with apcu_store()). If an array is passed then each element is fetched and returned.
     * @param bool $success Set to true in success and false in failure.
     * 
     * @return mixed
     */
    public function fetch(mixed $key, bool $success = false): mixed
    {
        if ($success === true) {
            apcu_fetch($key, $success);
            return $success;
        }

        return apcu_fetch($key);
    }

    /**
     * Increase a stored number
     *
     * @param string $key The key of the value being increased.
     * @param int $step The step, or value to increase.
     * @param bool|null $success Optionally pass the success or fail boolean value to this referenced variable.
     * @param int $ttl TTL to use if the operation inserts a new value (rather than incrementing an existing one).
     * 
     * @return int|false
     */
    public function increase(string $key, int $step = 1, ?bool $success = null, int $ttl = 0): int|false
    {
        if (is_bool($success)) {
            apcu_inc($key, $step, $success, $ttl);
            return $success;
        }

        return apcu_inc($key, $step, ttl: $ttl);
    }

    /**
     * Get detailed information about the cache key
     *
     * @param string $key Get detailed information about the cache key
     * 
     * @return array|null
     */
    public function keyInfo(string $key): ?array
    {
        return apcu_key_info($key);
    }

    /**
     * Retrieves APCu Shared Memory Allocation information
     *
     * @param bool $limited When set to false (default) apcu_sma_info() will return a detailed information about each segment.
     * 
     * @return array|false
     */
    public function smaInfo(bool $limited = false): array|false
    {
        return apcu_sma_info($limited);
    }

    /**
     * Cache a variable in the data store
     *
     * @param array|string $key Store the variable using this name. keys are cache-unique, so storing a second value with the same key will overwrite the original value.
     * @param mixed|null $var The variable to store
     * @param int $ttl Time To Live; store var in the cache for ttl seconds. After the ttl has passed, the stored variable will be expunged from the cache (on the next request). If no ttl is supplied (or if the ttl is 0), the value will persist until it is removed from the cache manually, or otherwise fails to exist in the cache (clear, restart, etc.).
     * 
     * @return bool|array 
     */
    public function store(array|string $key, mixed $var = null, int $ttl = 0): bool|array
    {
        return apcu_store($key, $var, $ttl);
    }
}
