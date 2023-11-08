<?php

namespace Tests\Unit\Migrations;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswersTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * answersテーブルが存在するかどうか
     */
    public function test_exists_answers_table(): void
    {
        $this->assertTrue(Schema::hasTable('answers'));
    }

    /**
     * 必要なカラムが存在するかどうか
     */
    public function test_has_necessary_columns()
    {
        $this->assertTrue(Schema::hasColumns(
            'answers',
            [
                'id',
                'question_id',
                'firestore_id',
                'answer',
                'liked_count',
                'disliked_count',
                'posted_at',
                'posted_user_id',
                'created_at',
                'updated_at',
            ]
        ));
    }

    /**
     * question_idはquestionsテーブルのidを参照しているか
     */
    public function test_question_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('question_id'));
    }
}
