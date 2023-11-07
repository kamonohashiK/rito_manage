<?php

namespace Tests\Unit\Migrations;

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
        $this->assertTrue(Schema::hasTable('cities'));
    }

    /**
     * 必要なカラムが存在するかどうか
     */
    public function test_has_necessary_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('cities', [
            'id',
            'prefecture_id',
            'name',
            'en_name',
            'code',
            'created_at',
            'updated_at',
        ]));
    }

    /**
     * prefecture_idはprefecturesテーブルのidを参照しているか
     */
    public function test_prefecture_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('prefecture_id'));
    }
}
