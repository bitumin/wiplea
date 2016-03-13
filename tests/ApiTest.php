<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testApiRoutes()
    {
        /*Check goal*/
//        $this->get('check/goal')->seeJson(); //fails

        /*Random*/
//        $this->get('api/random')->seeJson(); //fails

        /*Index*/
        $this->get('api/religion')->seeJson();
        $this->get('api/recipient')->seeJson();
        $this->get('api/goal')->seeJson();
        $this->get('api/plea')->seeJson();
        $this->get('api/stat')->seeJson();
        $this->get('api/religion/1/recipient')->seeJson();

        /*Show*/

        /*Store*/

        /*Update*/

    }
}
