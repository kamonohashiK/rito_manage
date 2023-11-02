<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Prefecture;
use App\Models\City;

class CityTest extends TestCase
{
    use RefreshDatabase;

    protected $prefecture;
    protected $city;

    protected function setUp(): void
    {
        parent::setUp();
        $this->prefecture = Prefecture::factory()->create();
        $this->city = City::factory()->for($this->prefecture)->create();
    }

    /**
     * 市区町村が属する都道府県を取得できるかテスト
     * @return void
     */
    public function test_prefecture(): void
    {
        $pref = $this->city->prefecture;

        // 取得した都道府県のIDが、テストデータの都道府県のIDと一致するか
        $this->assertEquals($this->prefecture->id, $pref->id);
    }
}
