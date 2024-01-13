<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class LaravelVersionObserver
{
    public function created()
    {
        Cache::forget('version');
        Cache::forget('version_all');
    }
}
