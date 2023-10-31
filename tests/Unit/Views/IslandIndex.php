<?php

namespace Tests\Unit\Views;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Island;
use App\Models\Prefecture;
use App\Models\City;
use Illuminate\Support\Facades\DB;
class IslandIndex extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $prefecture;
    protected $city;
    protected $islands;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->prefecture = Prefecture::factory()->create();
        $this->city = City::factory()->for($this->prefecture)->create();
        $this->islands = Island::factory(100)->create();

        foreach ($this->islands as $island) {
            DB::table('city_islands')->insert([
                'city_id' => $this->city->id,
                'island_id' => $island->id,
            ]);
        }
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
            // NOTE: 各島の詳細ページへのリンクがあるかどうかテストしたい
            ->assertSeeInOrder(["<td>", $this->islands[0]->name, "</td>"], false);
    }
}
