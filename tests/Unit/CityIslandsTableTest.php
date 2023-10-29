<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CityIslandsTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * city_islandsテーブルが存在するかどうか
     */
    public function test_exists_city_islands_table(): void
    {
        $this->assertTrue(Schema::hasTable('city_islands'));
    }

    /**
    * 必要なカラムが存在するかどうか
    */
    public function test_has_necessary_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('city_islands', [
            'id',
            'city_id',
            'island_id',
            'created_at',
            'updated_at',
        ]));
    }

    /**
    * city_idはcitiesテーブルのidを参照しているか
    */
    public function test_city_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('city_id'));
    }

    /**
    * island_idはislandsテーブルのidを参照しているか
    */
    public function test_island_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('island_id'));
    }
}
