<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Island;

class IslandTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // factoryから100件のダミーデータを作成
        for ($i = 0; $i < 100; $i++) {
            Island::factory()->create();
        }
    }

    /**
     * IDからレコードを取得できるかテスト
     */
    public function test_get_record_by_id()
    {
        $island = Island::factory()->create();
        $this->assertEquals($island->id, Island::getById($island->id)->id);
    }

    /**
     * 全件取得できるかテスト
     */
    public function test_get_all_records()
    {
        $this->assertEquals(100, Island::getAll()->count());
    }

    // TOOO: citiesのテストを書く
}
