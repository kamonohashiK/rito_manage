<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IslandsTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * islandsテーブルが存在するかどうか
     */
    public function test_islandsテーブルが作成される(): void
    {
        /**
         * テーブルが存在するか
         */
        $this->assertTrue(Schema::hasTable('islands'));

        /**
         * 必要なカラムが存在するか
         */
        $this->assertTrue(Schema::hasColumns('islands', [
            'id',
            'firestore_id',
            'name',
            'kana',
            'en_name',
            'lat',
            'lng',
            'created_at',
            'updated_at',
        ]));
    }
}
