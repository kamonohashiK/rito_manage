<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CityIsland
 *
 * @property int $id
 * @property int $city_id
 * @property int $island_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland whereIslandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityIsland whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CityIsland extends Model
{
    use HasFactory;
}
