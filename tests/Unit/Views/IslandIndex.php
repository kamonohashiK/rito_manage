<?php

namespace Tests\Unit\Views;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Island;

class IslandIndex extends TestCase
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
     * 島の一覧画面で必要な要素が描画されているかテスト
     * @return void
     */
    public function test_index_page(): void
    {
        $response = $this->actingAs($this->user)->get('/');

        $response->assertStatus(200);
        $response
            ->assertSee('島一覧')
            ->assertSee('<th>島名</th>', false)
            ->assertSee('<th>都道府県名</th>', false)
            ->assertSee('<th>市区町村名</th>', false)
            ->assertSee("<td>{$this->islands[0]->name}</td>", false);
    }
}
