<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Prefecture
 *
 * @property int $id
 * @property string $name 都道府県名
 * @property string $en_name 都道府県名の英語表記
 * @property string $code 都道府県コード
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Database\Factories\PrefectureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereEnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prefecture extends Model
{
    use HasFactory;

    /**
     * この都道府県に属する市区町村を取得
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
