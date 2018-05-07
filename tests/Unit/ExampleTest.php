<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testHome()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $response = $this->call('GET', '/home');
        $response->assertStatus(200);
    }
    public function testCreateUser()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $response = $this->call('GET', '/home'.$user->id.'/profile');
        $response->assertStatus(404);
    }
}