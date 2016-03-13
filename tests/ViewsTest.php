<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testViewsRoutes()
    {
        $this->visit('/')->see('Loading');
        $this->visit('view/menu')->see('report errors');
        $this->visit('view/religions')->see('Choose religion');
        $this->visit('view/recipients/1')->see('Choose recipient');
        $this->visit('view/goals')->see('Choose your goal');
        $this->visit('view/plea')->see('Send my plea');
        $this->visit('view/done')->see('has been sent!');
        $this->visit('view/stats')->see('Statistics');
        $this->visit('view/read')->see('Read another plea');
    }
}
