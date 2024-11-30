<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // コメントのデータ登録において、変更可能なカラムを指定
    protected $fillable = ['item_id', 'user_name', 'content'];

    /**
     * Itemモデルとのリレーション
     * 各コメントは1つのアイテムに属する（1対多の「多」側）
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
