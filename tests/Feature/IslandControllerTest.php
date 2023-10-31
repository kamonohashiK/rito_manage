<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Island;
use Tests\TestCase;

class IslandControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $islands;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->islands = Island::factory(100)->create();
    }

    /**
     * ログインしている場合は、島の一覧画面が表示されるかテスト
     * @return void
     */
    public function test_index_page(): void
    {
        $response = $this->actingAs($this->user)->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('island.index');
        $response->assertViewHas('islands');
    }

    /**
     * ログインしていない状態で一覧画面にアクセスした場合は、ログイン画面にリダイレクトされるかテスト
     * @return void
     */
    public function test_index_page_when_not_login(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * ログインしている状態でisland/{$id}にアクセスした場合は、島の詳細画面が表示されるかテスト
     * @return void
     */
    public function test_show_page(): void
    {
        $island = $this->islands->first();

        $response = $this->actingAs($this->user)->get("/island/{$island->id}");

        $response->assertStatus(200);
        $response->assertViewIs('island.show');
        $response->assertViewHas('island');
    }

    /**
     * 詳細ページで島のデータが存在しない場合は、404ページを表示するテスト
     * @return void
     */
    public function test_show_404_when_island_not_found(): void
    {
        $response = $this->actingAs($this->user)->get("/island/101");

        $response->assertStatus(404);
    }

    /**
     * 詳細ページでログインしていない場合は、ログイン画面にリダイレクトされるかテスト
     * @return void
     */
    public function test_show_page_when_not_login(): void
    {
        $island = $this->islands->first();

        $response = $this->get("/island/{$island->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}