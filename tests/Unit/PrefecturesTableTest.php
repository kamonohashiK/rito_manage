<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrefecturesTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * prefecturesテーブルが存在するかどうか
     */
    public function test_exists_prefectures_table(): void
    {
        /**
         * テーブルが存在するか
         */
        $this->assertTrue(Schema::hasTable('prefectures'));

        /**
         * 必要なカラムが存在するか
         */
        $this->assertTrue(Schema::hasColumns('prefectures', [
            'id',
            'name',
            'en_name',
            'code',
            'created_at',
            'updated_at',
        ]));
    }
}
