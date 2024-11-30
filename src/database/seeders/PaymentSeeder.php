<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 新規登録の前に、既存のデータを削除
        DB::table('payments')->delete();

        // 支払方法データを挿入
        DB::table('payments')->insert([
            [
                'payment' => 'コンビニ払い',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'payment' => 'カード支払い',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
