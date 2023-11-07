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
        Schema::create('island_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('island_id')->constrained('islands');
            $table->string('firestore_id', 100)->comment('Firestore ID')->index();
            $table->string('question', 100)->comment('質問文');
            $table->integer('answer_count')->comment('回答数');
            $table->boolean('is_default')->comment('デフォルト質問かどうか');
            $table->timestamp('posted_at')->comment('投稿日時');
            $table->foreignId('posted_user_id')->comment('投稿者のFirestore ID');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('island_questions', function (Blueprint $table) {
            $table->dropForeign(['island_id']);
        });
        Schema::dropIfExists('island_questions');
    }
};
