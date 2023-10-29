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
        $this->assertTrue(Schema::hasTable('islands'));
    }
}
