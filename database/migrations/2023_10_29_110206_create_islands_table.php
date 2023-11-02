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
        Schema::create('islands', function (Blueprint $table) {
            $table->id();
            $table->string('firestore_id', 40)->comment('Firestoreで使用するID');
            $table->string('name', 20)->comment('島の名前');
            $table->string('kana', 40)->comment('島の名前のふりがな');
            $table->string('en_name', 40)->comment('島の名前の英語表記');
            $table->decimal('lat', 8, 6)->comment('島の緯度');
            $table->decimal('lng', 9, 6)->comment('島の経度');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islands');
    }
};
