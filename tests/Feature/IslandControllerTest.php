<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class IslandControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ログインしている場合は、島の一覧画面が表示されるかテスト
     *
     * @return void
     */
    public function test_index_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('island.index');
        $response->assertViewHas('islands');
    }

    /**
     * ログインしていない場合は、ログイン画面にリダイレクトされるかテスト
     *
     * @return void
     */
    public function test_index_page_when_not_login(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
