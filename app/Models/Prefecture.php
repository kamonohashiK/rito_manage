<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    //TODO: モデルの単体テストを書く

    /**
     * この都道府県に属する市区町村を取得
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
