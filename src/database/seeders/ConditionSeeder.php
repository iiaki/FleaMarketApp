<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 新規登録の前に、既存のデータを削除
        DB::table('conditions')->delete();

        // 商品の状態データを挿入
        DB::table('conditions')->insert([
            [
                'condition' => '良好',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'condition' => '目立った傷や汚れなし',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'condition' => 'やや傷や汚れあり',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'condition' => '状態が悪い',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
