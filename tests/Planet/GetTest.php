<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use StarWarsApi\Core\Planet;

class GetTest extends TestCase
{
    public function testListing()
    {

        $planet = Planet::orderBy('id')->first();
        /*
         * EMPTY NAME
         */
        $this->json('get', "/planet/{$planet->id}")
            ->seeStatusCode(200)
            ->seeJsonStructure([
                "name",
                "id",
                "filmsCount",
                "terrain",
                "climate"
            ]);
    }

    public function notExists(){
        $this->json('get', "/planet/0")
            ->seeStatusCode(404)
            ->seeJsonEquals([
                "error" => "Not found Planet"
            ]);

    }
}