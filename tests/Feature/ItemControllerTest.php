<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $token;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
    }

    public function test_list_items()
    {
        Item::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->getJson('/api/items');

        \Log::info($response->getContent());

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }
}
