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
    }
}
