<?php

namespace Tests\Feature\Views;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Island;
use App\Models\Prefecture;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class IslandShow extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $prefecture;
    protected $city;
    protected $island;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->prefecture = Prefecture::factory()->create();
        $this->city = City::factory()->for($this->prefecture)->create();
        $this->island = Island::factory()->create();

        DB::table('city_islands')->insert([
            'city_id' => $this->city->id,
            'island_id' => $this->island->id,
        ]);
    }

    /**
     * 詳細画面で必要な要素が描画されているかテスト
     * @return void
     */
    public function test_show_page(): void
    {
        $response = $this->actingAs($this->user)->get("/island/{$this->island->id}");

        $response->assertStatus(200);
        $response->assertViewHas('island')
            ->assertViewHas('city_name');
        $response->assertSee($this->island->name, false)
            ->assertSee("<th>ID</th>", false)
            ->assertSee($this->island->id, false)
            ->assertSee("<th>Firestore ID</th>", false)
            ->assertSee($this->island->firestore_id, false)
            ->assertSee("<th>都道府県</th>", false)
            ->assertSee($this->prefecture->name, false)
            ->assertSee("<th>市区町村</th>", false)
            ->assertSee($this->city->name, false)
            ->assertSee("<th>読み仮名</th>", false)
            ->assertSee($this->island->kana, false)
            ->assertSee("<th>英語表記</th>", false)
            ->assertSee($this->island->en_name, false)
            ->assertSee("<th>緯度</th>", false)
            ->assertSee($this->island->lat, false)
            ->assertSee("<th>経度</th>", false)
            ->assertSee($this->island->lng, false);
    }

    /**
     * 市区町村が2個以上の場合は、「他」の文字が表示されるかテスト
     */
    public function test_show_page_with_multiple_cities(): void
    {
        $other_city = City::factory()->for($this->prefecture)->create();
        DB::table('city_islands')->insert([
            'city_id' => $other_city->id,
            'island_id' => $this->island->id,
        ]);

        $response = $this->actingAs($this->user)->get("/island/{$this->island->id}");
        $response->assertSee("<th>市区町村</th>", false)
            ->assertSee("{$this->city->name} 他", false);
    }
}
