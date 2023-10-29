<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CitiesTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * citiesテーブルが存在するかどうか
     */
    public function test_exists_cities_table(): void
    {
        /**
         * テーブルが存在するか
         */
        $this->assertTrue(Schema::hasTable('cities'));

        /**
         * 必要なカラムが存在するか
         */
        $this->assertTrue(Schema::hasColumns('cities', [
            'id',
            'prefecture_id',
            'name',
            'en_name',
            'code',
            'created_at',
            'updated_at',
        ]));

        /**
         * prefecture_idはprefecturesテーブルのidを参照しているか
         */
        $this->assertTrue(Schema::enableForeignKeyConstraints('prefecture_id'));
    }
}
