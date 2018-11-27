<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ListTest extends TestCase
{
    public function testListing()
    {
        /*
         * EMPTY NAME
         */
        $this->json('get', '/planet')
            ->seeStatusCode(200);
    }
}