<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // テーブルが存在するなら削除
        Schema::dropIfExists('items');

        Schema::create('items', function (Blueprint $table) {
            $table->id(); // プライマリキーの設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 外部キーとしてusersテーブルを参照
            $table->json('categories'); // 商品カテゴリ
            $table->foreignId('condition')->constrained('conditions')->onDelete('cascade'); // 商品の状態を参照
            $table->string('item_name', 255); // 商品名
            $table->string('description', 255); // 商品の説明
            $table->decimal('price', 10, 2); // 値段
            $table->string('image_path'); // 商品イメージのパス
            $table->boolean('sale'); // 成約
            $table->timestamps(); // created_at と updated_at カラムを自動生成
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
