<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testlogin()
    {
        $user = User::factory()->create([
            'email' => 'coba1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'coba1@gmail.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/menus');
        $this->assertAuthenticatedAs($user);
    }

    public function testmenus()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/menus');
        $response->assertStatus(200); 
    }

    public function testlogout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_api_get_menus()
    {
        $response = $this->getJson('/api/menus');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'name', 'price']
                 ]);
    }

    public function test_api_create_menu()
    {
        $data = [
            'name' => 'Cappuchino',
            'description' => 'Hmm Enak bgt',
            'price' => 15000,
            'image_url' => 'https://images.unsplash.com/photo-1558019939-63dfb181280b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ];

        $response = $this->postJson('/api/menus', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Cappuchino']);
    }

    public function test_api_update_menu()
    {
        $menu = Menu::factory()->create();

        $data = ['name' => 'Update Menu', 'price' => 20000];

        $response = $this->putJson("/api/menus/{$menu->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Update Menu']);
    }

    public function test_api_delete_menu()
    {
        $menu = Menu::factory()->create();

        $response = $this->deleteJson("/api/menus/{$menu->id}");

        $response->assertStatus(200);
    }
}
