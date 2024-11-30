<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        // テーブルが存在するなら削除
        Schema::dropIfExists('favorites');

        Schema::create('favorites', function (Blueprint $table) {
            $table->id(); // プライマリキーの設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ユーザーIDを外部キーとして設定
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); // 商品IDを外部キーとして設定
            $table->timestamps(); // created_at と updated_at カラムを自動生成
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites'); // テーブルを削除する
    }
}
