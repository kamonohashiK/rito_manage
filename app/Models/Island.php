<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Island extends Model
{
    use HasFactory;

    /**
     * IDからレコードを取得する
     *
     * @param int $id
     * @return Island
     */
    public static function getById(int $id): Island
    {
        return self::where('id', $id)->first();
    }

    /**
     * Indexページ用のデータを全件取得する
     *
     * @return array
     */
    public static function getAllForIndex()
    {
        //TODO: これをクエリビルダで書き直す
        $islands = DB::select("
            select distinct on (islands.id) islands.id, islands.name, prefectures.name as prefecture_name, cities.name as city_name from islands
            join city_islands on islands.id = city_islands.island_id
            join cities on city_islands.city_id = cities.id
            join prefectures on cities.prefecture_id = prefectures.id
            order by islands.id");

        return $islands;
    }

    /**
     * CityIslandを通して、市区町村名を取得する
     */
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_islands');
    }
}
