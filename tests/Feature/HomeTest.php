<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertSeeText('Laravel CRUD');
        $response->assertSeeText('This is a simple app implementing a CRUD for managing content on a MySQL database.');
    }

    public function testContactPage()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact');
        $response->assertSeeText('This app was created by Mark L Tierney as a demonstration of Laravel PHP full stack proficiency.');
        $response->assertSeeText('email: marktierney66@gmail.com');
    }
}
