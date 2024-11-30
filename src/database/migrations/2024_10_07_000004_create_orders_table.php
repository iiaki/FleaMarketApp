<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        // テーブルが存在するなら削除
        Schema::dropIfExists('orders');

        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // プライマリキーの設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ユーザーIDを外部キーとして設定
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); // 商品IDを外部キーとして設定
            $table->foreignId('payment')->constrained('payments')->onDelete('cascade'); // 支払方法を外部キーとして設定
            $table->string('delivery_postal_code', 255); // 送り先の郵便番号
            $table->string('delivery_address', 255); // 送り先の住所
            $table->string('delivery_building', 255); // 送り先の建物
            $table->timestamps(); // created_at と updated_at カラムを自動生成
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders'); // テーブルを削除する
    }
}
