<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Prefecture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // テスト用ユーザー作成
            UsersTableSeeder::class,
            // 初期データ作成
            PrefecturesTableSeeder::class,
            CitiesTableSeeder::class,
            IslandsTableSeeder::class,
            CityIslandsTableSeeder::class,
            // サンプルデータ作成 ※本番環境では実行しない
            QuestionsTableSampleSeeder::class,
            AnswersTableSampleSeeder::class,
        ]);
    }
}
