<?php

namespace Tests\Feature\AuthTest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_return_token_with_valid_credentials(): void
    {
        $user=User::factory()->create();
        $response = $this->postJson('/api/login',[
            'email'=>$user->email,
            'password'=>'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token']);
    }

    public function test_login_return_error_with_invalid_credentials(): void
    {

        $response = $this->postJson('/api/login',[
            'email'=>'nonexisting@user.com',
            'password'=>'password,'
        ]);

        $response->assertStatus(422);

    }
}
