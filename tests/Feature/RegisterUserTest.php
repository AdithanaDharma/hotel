<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_page_can_be_accessed()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->post('/register', [
            'name' => 'Adelia',
            'username' => 'adel123',
            'email' => 'adelia@example.com',
            'no_hp' => '08123456789',
            'address' => 'Purwokerto',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertAuthenticated(); // pastikan user login
        $response->assertRedirect('/home'); // ganti jika RouteServiceProvider::HOME beda
        $this->assertDatabaseHas('users', [
            'email' => 'adelia@example.com',
            'username' => 'adel123',
        ]);
    }

    /** @test */
    public function registration_requires_all_fields()
    {
        $response = $this->post('/register', []);
        $response->assertSessionHasErrors([
            'name',
            'username',
            'email',
            'no_hp',
            'address',
            'password',
        ]);
    }
}
 vc