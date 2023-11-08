<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class QuestionsTableSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'island_id' => 1,
                'firestore_id' => 'hoge',
                'question' => 'サンプル質問1',
                'answer_count' => 1,
                'is_default' => true,
                'posted_at' => Carbon::now(),
                'posted_user_id' => 'hogehoge',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'island_id' => 1,
                'firestore_id' => 'fuga',
                'question' => 'サンプル質問2',
                'answer_count' => 2,
                'is_default' => true,
                'posted_at' => Carbon::now(),
                'posted_user_id' => 'fugafuga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'island_id' => 2,
                'firestore_id' => 'piyo',
                'question' => 'サンプル質問3',
                'answer_count' => 0,
                'is_default' => false,
                'posted_at' =>
                Carbon::now(),
                'posted_user_id' => 'piyopiyo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
