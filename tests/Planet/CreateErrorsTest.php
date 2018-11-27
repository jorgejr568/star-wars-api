<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CreateErrorsTest extends TestCase
{
    public function testErrorOnNameEmpty()
    {
        /*
         * EMPTY NAME
         */
        $this->json('POST', '/planet', ['name' => ""])
            ->seeStatusCode(422)
            ->seeJson([
                "The name field is required."
            ]);
    }

    public function testErrorOnNameLessThan3()
    {
        /*
         * Less then 3 chars
         */
        $this->json('POST', '/planet', ['name' => str_random(2)])
            ->seeStatusCode(422)
            ->seeJson([
                "The name must be at least 3 characters.",
            ]);
    }

    public function testErrorOnNameGreaterThan50()
    {
        /*
         * Greater then 50 chars
         */
        $this->json('POST', '/planet', ['name' => str_random(60)])
            ->seeStatusCode(422)
            ->seeJson([
                "The name may not be greater than 50 characters.",
            ]);
    }

    public function testErrorOnTerrainEmpty()
    {
        /*
         * EMPTY NAME
         */
        $this->json('POST', '/planet', ['terrain' => ""])
            ->seeStatusCode(422)
            ->seeJson([
                "The terrain field is required."
            ]);
    }

    public function testErrorOnTerrainLessThan3()
    {
        /*
         * Less then 3 chars
         */
        $this->json('POST', '/planet', ['terrain' => str_random(2)])
            ->seeStatusCode(422)
            ->seeJson([
                "The terrain must be at least 3 characters.",
            ]);
    }

    public function testErrorOnTerrainGreaterThan50()
    {
        /*
         * Greater then 50 chars
         */
        $this->json('POST', '/planet', ['terrain' => str_random(60)])
            ->seeStatusCode(422)
            ->seeJson([
                "The terrain may not be greater than 50 characters.",
            ]);
    }

    public function testErrorOnClimateEmpty()
    {
        /*
         * EMPTY NAME
         */
        $this->json('POST', '/planet', ['climate' => ""])
            ->seeStatusCode(422)
            ->seeJson([
                "The climate field is required."
            ]);
    }

    public function testErrorOnClimateLessThan3()
    {
        /*
         * Less then 3 chars
         */
        $this->json('POST', '/planet', ['climate' => str_random(2)])
            ->seeStatusCode(422)
            ->seeJson([
                "The climate must be at least 3 characters.",
            ]);
    }

    public function testErrorOnClimateGreaterThan50()
    {
        /*
         * Greater then 50 chars
         */
        $this->json('POST', '/planet', ['climate' => str_random(60)])
            ->seeStatusCode(422)
            ->seeJson([
                "The climate may not be greater than 50 characters.",
            ]);
    }
}