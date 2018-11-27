<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use StarWarsApi\Core\Planet;

class RemoveTest extends TestCase
{
    public function testListing()
    {

        $planet = Planet::orderBy('id',"DESC")->first();
        /*
         * EMPTY NAME
         */
        $this->json('delete', "/planet/{$planet->id}")
            ->seeStatusCode(200)
            ->seeJsonEquals([
                "error" => false
            ]);
    }

    public function notExists(){
        $this->json('delete', "/planet/0")
            ->seeStatusCode(404)
            ->seeJsonEquals([
                "error" => "Not found Planet"
            ]);

    }
}