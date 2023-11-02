<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prefectures')->insert([
            ["id" => 1, "name" => "北海道", "en_name" => "Hokkaido", "code" => "HKD"],
            ["id" => 2, "name" => "宮城県", "en_name" => "Miyagi", "code" => "MYG"],
            ["id" => 3, "name" => "山形県", "en_name" => "Yamagata", "code" => "YMGT"],
            ["id" => 4, "name" => "東京都", "en_name" => "Tokyo", "code" => "TKY"],
            ["id" => 5, "name" => "千葉県", "en_name" => "Chiba", "code" => "CB"],
            ["id" => 6, "name" => "神奈川県", "en_name" => "Kanagawa", "code" => "KNG"],
            ["id" => 7, "name" => "新潟県", "en_name" => "Niigata", "code" => "NGT"],
            ["id" => 8, "name" => "石川県", "en_name" => "Ishikawa", "code" => "ISK"],
            ["id" => 9, "name" => "静岡県", "en_name" => "Shizuoka", "code" => "SZO"],
            ["id" => 10, "name" => "愛知県", "en_name" => "Aichi", "code" => "AIC"],
            ["id" => 11, "name" => "三重県", "en_name" => "Mie", "code" => "ME"],
            ["id" => 12, "name" => "滋賀県", "en_name" => "Shiga", "code" => "SIG"],
            ["id" => 13, "name" => "兵庫県", "en_name" => "Hyogo", "code" => "HYG"],
            ["id" => 14, "name" => "和歌山県", "en_name" => "Wakayama", "code" => "WKY"],
            ["id" => 15, "name" => "島根県", "en_name" => "Shimane", "code" => "SMN"],
            ["id" => 16, "name" => "岡山県", "en_name" => "Okayama", "code" => "OKY"],
            ["id" => 17, "name" => "広島県", "en_name" => "Hiroshima", "code" => "HRS"],
            ["id" => 18, "name" => "山口県", "en_name" => "Yamaguchi", "code" => "YMGC"],
            ["id" => 19, "name" => "徳島県", "en_name" => "Tokushima", "code" => "TKS"],
            ["id" => 20, "name" => "香川県", "en_name" => "Kagawa", "code" => "KGW"],
            ["id" => 21, "name" => "愛媛県", "en_name" => "Ehime", "code" => "EHM"],
            ["id" => 22, "name" => "高知県", "en_name" => "Kochi", "code" => "KUC"],
            ["id" => 23, "name" => "福岡県", "en_name" => "Fukuoka", "code" => "FKO"],
            ["id" => 24, "name" => "佐賀県", "en_name" => "Saga", "code" => "SAG"],
            ["id" => 25, "name" => "長崎県", "en_name" => "Nagasaki", "code" => "NGS"],
            ["id" => 26, "name" => "熊本県", "en_name" => "Kumamoto", "code" => "KMM"],
            ["id" => 27, "name" => "大分県", "en_name" => "Oita", "code" => "OIT"],
            ["id" => 28, "name" => "宮崎県", "en_name" => "Miyazaki", "code" => "MYZ"],
            ["id" => 29, "name" => "鹿児島県", "en_name" => "Kagoshima", "code" => "KGS"],
            ["id" => 30, "name" => "沖縄県", "en_name" => "Okinawa", "code" => "OKN"]
        ]);
    }
}