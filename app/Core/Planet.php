<?php

namespace StarWarsApi\Core;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    const PLANET_FILMS_COUNT_CACHE_PREFIX = "PLANET_FILMS_COUNT/ID -> ";
    protected $fillable = [
        "id",
        "name",
        "climate",
        "terrain",
        "created_at",
        "updated_at"
    ];

    protected $dates = [
        "created_at",
        "updated_at"
    ];

    /**
     * @return int
     */
    public function getFilmsCount(){
        /** @var \Illuminate\Cache\Repository $cache */
        $cacheName = self::PLANET_FILMS_COUNT_CACHE_PREFIX.$this->id;

        if(\Cache::has($cacheName)) return \Cache::get($cacheName);
        else {
            $swapiResponse = json_decode(@file_get_contents("https://swapi.co/api/planets/{$this->id}"));

            $filmsCount = is_object($swapiResponse) ? count($swapiResponse->films) : 0;

            \Cache::put($cacheName,$filmsCount,1440);

            return $filmsCount;
        }
    }
}
