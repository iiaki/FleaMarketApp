<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        // テーブルが存在するなら削除
        Schema::dropIfExists('comments');

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); // アイテムへの外部キー
            $table->string('user_name'); // ユーザー名
            $table->text('content'); // コメント内容
            $table->timestamps(); // created_at と updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
