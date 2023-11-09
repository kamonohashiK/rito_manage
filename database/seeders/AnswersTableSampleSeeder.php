<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AnswersTableSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('answers')->insert([
            [
                'question_id' => 1,
                'firestore_id' => 'hoge',
                'answer' => 'サンプル回答1',
                'liked_count' => 1,
                'disliked_count' => 0,
                'posted_user_id' => 'hogehoge',
                'posted_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_id' => 2,
                'firestore_id' => 'fugafuga',
                'answer' => 'サンプル回答2',
                'liked_count' => 1,
                'disliked_count' => 0,
                'posted_user_id' => 'fugafuga',
                'posted_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_id' => 2,
                'firestore_id' => 'piyopiyo',
                'answer' => 'サンプル回答3',
                'liked_count' => 0,
                'disliked_count' => 0,
                'posted_user_id' => 'piyopiyo',
                'posted_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}