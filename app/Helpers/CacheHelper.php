<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    /**
     * Forget a list of cache keys.
     *
     * @param array $keys List of cache keys to forget.
     */
    public static function forget(array $keys)
    {
        foreach ($keys as $key) {
            Cache::forget($key);
        }
    }
}
