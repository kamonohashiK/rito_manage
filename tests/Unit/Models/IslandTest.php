<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Prefecture;
use App\Models\City;
use App\Models\Island;
use Illuminate\Support\Facades\DB;

class IslandTest extends TestCase
{
    use RefreshDatabase;

    protected $prefecture;
    protected $city;
    protected $other_city;
    protected $islands;

    protected function setUp(): void
    {
        parent::setUp();
        $this->prefecture = Prefecture::factory()->create();
        $this->city = City::factory()->for($this->prefecture)->create();
        $this->other_city = City::factory()->for($this->prefecture)->create();

        $this->islands = Island::factory(100)->create();

        foreach ($this->islands as $island) {
            DB::table('city_islands')->insert([
                'city_id' => $this->city->id,
                'island_id' => $island->id,
            ]);
        }
    }

    /**
     * IDからレコードを取得できるかテスト
     * @return void
     */
    public function test_get_record_by_id(): void
    {
        $island = Island::factory()->create();
        $this->assertEquals($island->id, Island::getById($island->id)->id);
    }

    /**
     * Indexページ用の全件取得メソッドをテスト
     * @return void
     */
    public function test_get_all_for_index(): void
    {
        $this->assertEquals(100, count(Island::getAllForIndex()));

        // 取得結果の検証
        foreach(Island::getAllForIndex() as $index => $island) {
            $this->assertEquals($this->islands[$index]->id, $island->id);
            $this->assertEquals($this->islands[$index]->name, $island->name);
            $this->assertEquals($this->prefecture->name, $island->prefecture_name);
            $this->assertEquals($this->city->name, $island->city_name);
        }
    }

    /**
     * 島が属する市区町村を取得できるかテスト
     * @return void
     */
    public function test_cities(): void
    {
        // 1個の市区町村にしか属さない場合
        $island = $this->islands->first();
        $cities = $island->cities;

        $this->assertEquals(1, $cities->count());
        $this->assertTrue($cities->pluck('name')->contains($this->city->name));

        // 2個の市区町村に属する場合
        $other_island = $this->islands->last();
        DB::table('city_islands')->insert([
            'city_id' => $this->other_city->id,
            'island_id' => $other_island->id,
        ]);
        $cities = $other_island->cities;

        $this->assertEquals(2, $cities->count());
        $this->assertTrue($cities->pluck('name')->contains($this->city->name));
        $this->assertTrue($cities->pluck('name')->contains($this->other_city->name));
    }
}
