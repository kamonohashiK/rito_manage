<?php

namespace Tests\Unit\Migrations;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IslandQuestionsTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * island_questionsテーブルが存在するかどうか
     */
    public function test_exists_island_questions_table(): void
    {
        $this->assertTrue(Schema::hasTable('island_questions'));
    }

    /**
     * 必要なカラムが存在するかどうか
     */
    public function test_has_necessary_columns()
    {
        $this->assertTrue(Schema::hasColumns('island_questions', [
            'id',
            'island_id',
            'firestore_id',
            'question',
            'answer_count',
            'is_default',
            'posted_at',
            'posted_user_id',
            'created_at',
            'updated_at',
        ]));
    }

    /**
     * island_idはislandsテーブルのidを参照しているか
     */
    public function test_island_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('island_id'));
    }
}
