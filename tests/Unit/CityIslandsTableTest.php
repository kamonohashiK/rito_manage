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
        /**
         * テーブルが存在するか
         */
        $this->assertTrue(Schema::hasTable('city_islands'));
    }
}
