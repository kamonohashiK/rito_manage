<?php

namespace Tests\Unit\Migrations;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuestionAnswersTable extends TestCase
{
    use DatabaseMigrations;

    /**
     * question_answersテーブルが存在するかどうか
     */
    public function test_exists_question_answers_table(): void
    {
        $this->assertTrue(Schema::hasTable('question_answers'));
    }

    /**
     * 必要なカラムが存在するかどうか
     */
    public function test_has_necessary_columns()
    {
        $this->assertTrue(Schema::hasColumns(
            'question_answers',
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
     * question_idはisland_questionsテーブルのidを参照しているか
     */
    public function test_question_id_foreign(): void
    {
        $this->assertTrue(Schema::enableForeignKeyConstraints('question_id'));
    }
}
