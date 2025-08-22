<?php

namespace Tests\Feature;

use Tests\TestCase;

class Pake extends TestCase
{
    public function test_login()
    {
        $response = $this->get('dashboard');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }
}
