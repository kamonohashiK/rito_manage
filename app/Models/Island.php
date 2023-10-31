<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * 全件取得する
     *
     * @return \Illuminate\Database\Eloquent\Collection<Island>
     */
    public static function getAll()
    {
        return self::all();
    }

    /**
     * CityIslandを通して、市区町村名を取得する
     */
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_islands');
    }
}
