<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;

class PrefectureTest extends TestCase
{
    use RefreshDatabase;

    protected $prefecture;
    protected $other_prefecture;
    protected $cities;

    protected function setUp(): void
    {
        parent::setUp();
        $this->prefecture = Prefecture::factory()->create();
        $this->other_prefecture = Prefecture::factory()->create();

        // テストデータを作成
        $this->cities = [
            [
                'id' => 1,
                'prefecture_id' => $this->prefecture->id,
                'name' => 'テスト1',
                'en_name' => 'test1',
                'code' => 'TS1',
            ],
            [
                'id' => 2,
                'prefecture_id' => $this->prefecture->id,
                'name' => 'テスト2',
                'en_name' => 'test2',
                'code' => 'TS2',
            ],
            [
                'id' => 3,
                'prefecture_id' => $this->other_prefecture->id,
                'name' => 'テスト3',
                'en_name' => 'test3',
                'code' => 'TS3',
            ],
        ];

        // 連想配列をベースにデータを作成
        foreach ($this->cities as $city) {
            DB::table('cities')->insert([
                'id' => $city['id'],
                'prefecture_id' => $city['prefecture_id'],
                'name' => $city['name'],
                'en_name' => $city['en_name'],
                'code' => $city['code'],
            ]);
        }
    }

    /**
     * 都道府県に属する市区町村を取得できるかテスト
     * @return void
     */
    public function test_cities(): void
    {
        $cities = $this->prefecture->cities();

        // 2件取得できているか
        $this->assertEquals(2, $cities->count());
        // 取得したデータのnameがテスト1とテスト2であるか
        $this->assertTrue($cities->pluck('name')->contains('テスト1'));
        $this->assertTrue($cities->pluck('name')->contains('テスト2'));
        // 取得したデータのnameにテスト3が含まれていないか
        $this->assertFalse($cities->pluck('name')->contains('テスト3'));
    }
}
