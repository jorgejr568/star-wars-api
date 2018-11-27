<?php

use Illuminate\Database\Seeder;
use StarWarsApi\Core\Planet;
use StarWarsApi\Support\Repositories\PlanetRepository;

class PlanetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;

        $repository = new PlanetRepository();

        while (true){
            $swapiResponse = json_decode(@file_get_contents("https://swapi.co/api/planets/$i"));
            if (is_object($swapiResponse)) {
                $repository->create((new Planet())->fill([
                    "id" => $i,
                    "name" => $swapiResponse->name,
                    "climate" => $swapiResponse->climate,
                    "terrain" => $swapiResponse->terrain
                ]));
                $i++;
            } else break;
        }
    }
}
