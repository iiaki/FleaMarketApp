<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $casts = [
        'categories' => 'array',
    ];
    
        /**
     * 商品に紐づくコメントを取得するリレーション
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'item_id'); // 外部キーがitem_idであることを指定
    }
}
