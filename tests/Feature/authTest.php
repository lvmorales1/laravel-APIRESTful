<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class authTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $token;

    public function test_user_token_generation()
    {
        $this->user = User::factory()->create();

        \Log::info($this->user);

        $this->token = JWTAuth::fromUser($this->user);

        \Log::info($this->token);

        $this->assertNotEmpty($this->token);
    }
}
