<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthRouteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_admin_user_route_cannot_be_accessed_by_normal_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(403);
    }
}
