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

        $response->assertSeeText('Laravel Blog');
        $response->assertSeeText('This is a blog app implementing a CRUD with many useful features in Laravel PHP for managing content on a MySQL database, developed by Mark L Tierney for demonstration purposed.');
    }

    // public function testContactPage()
    // {
    //     $response = $this->get('/contact');

    //     $response->assertSeeText('Contact');
    //     $response->assertSeeText('This app was created by Mark L Tierney as a demonstration of Laravel PHP full stack proficiency.');
    //     $response->assertSeeText('email: marktierney66@gmail.com');
    // }
}
