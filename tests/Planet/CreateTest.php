<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CreateTest extends TestCase
{
    public function testCreation()
    {
        /*
         * EMPTY NAME
         */
        $this->json('POST', '/planet', [
                'name' => str_random(30),
                'terrain' => str_random(30),
                'climate' => str_random(30),
            ])
            ->seeStatusCode(200)
            ->seeJsonEquals([
                "error" => false
            ]);
    }
}