<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Island
 *
 * @property int $id
 * @property string $firestore_id Firestoreで使用するID
 * @property string $name 島の名前
 * @property string $kana 島の名前のふりがな
 * @property string $en_name 島の名前の英語表記
 * @property string $lat 島の緯度
 * @property string $lng 島の経度
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Database\Factories\IslandFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Island newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Island newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Island query()
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereEnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereFirestoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereKana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Island whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
     * @return \Illuminate\Database\Query\Builder
     */
    public static function getAllForIndex()
    {
        $islands = DB::table('islands')
            ->select('islands.id', 'islands.name', 'prefectures.name as prefecture_name', 'cities.name as city_name')
            ->distinct('islands.id')
            ->join('city_islands', 'islands.id', '=', 'city_islands.island_id')
            ->join('cities', 'city_islands.city_id', '=', 'cities.id')
            ->join('prefectures', 'cities.prefecture_id', '=', 'prefectures.id')
            ->orderBy('islands.id');

        return $islands;
    }

    /**
     * CityIslandを通して、市区町村名を取得する
     */
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_islands');
    }

    /**
     * 自身に紐づくQuestionを取得する
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
