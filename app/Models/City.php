<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    //TODO: モデルの単体テストを書く

    /**
     * 市区町村が属する都道府県を取得
     */
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}

