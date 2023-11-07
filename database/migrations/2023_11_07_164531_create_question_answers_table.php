<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('island_questions');
            $table->string('firestore_id', 100)->comment('Firestore ID')->index();
            $table->string('answer', 800)->comment('回答文');
            $table->integer('liked_count')->comment('高評価数');
            $table->integer('disliked_count')->comment('低評価数');
            $table->string('posted_user_id', 100)->comment('投稿者のFirestore ID');
            $table->timestamp('posted_at')->comment('投稿日時');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
        Schema::dropIfExists('question_answers');
    }
};
