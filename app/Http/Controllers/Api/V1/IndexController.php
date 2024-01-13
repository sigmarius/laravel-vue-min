<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LaravelVersionCollection;
use App\Http\Resources\LaravelVersionResource;
use App\Models\LaravelVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
//        без кеширования
//        return new LaravelVersionResource(LaravelVersion::orderBy('release_date', 'desc')->first());

        return new LaravelVersionResource(Cache::remember(
            'version',
            60 * 60 * 24,
            function () {
                return LaravelVersion::orderBy('release_date', 'desc')->first();
            }
        ));
    }

    public function all()
    {
//        возвращает json с пагинацией
//        return new LaravelVersionCollection(LaravelVersion::paginate(1));

//        без кеширования
//        return new LaravelVersionCollection(LaravelVersion::all());

        return new LaravelVersionCollection(Cache::remember(
            'version_all',
            60 * 60 * 24 * 7,
            function () {
                return LaravelVersion::all();
            }
        ));
    }
}
