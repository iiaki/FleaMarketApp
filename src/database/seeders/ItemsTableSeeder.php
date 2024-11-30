<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
         // `images` フォルダの中身を削除
         Storage::disk('public')->deleteDirectory('images');
         Storage::disk('public')->makeDirectory('images'); // 空の images フォルダを再作成

        // 各レコードに対応する画像URLのリスト
        $items = [
            [
                'user_id' => 1,
                'categories' => json_encode(['1', '6', '12']),
                'condition' => 1,
                'item_name' => '腕時計',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'price' => 15000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'categories' => json_encode(['2']),
                'condition' => 2,
                'item_name' => 'HDD',
                'description' => '高速で信頼性の高いハードディスク',
                'price' => 5000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['10']),
                'condition' => 3,
                'item_name' => '玉ねぎ3束',
                'description' => '新鮮な玉ねぎ3束のセット',
                'price' => 300,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'categories' => json_encode(['1', '5']),
                'condition' => 4,
                'item_name' => '革靴',
                'description' => 'クラシックなデザインの革靴',
                'price' => 4000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['2', '13']),
                'condition' => 1,
                'item_name' => 'ノートPC',
                'description' => '高性能なノートパソコン',
                'price' => 45000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['2', '13']),
                'condition' => 2,
                'item_name' => 'マイク',
                'description' => '高音質のレコーディング用マイク',
                'price' => 8000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['1', '4']),
                'condition' => 3,
                'item_name' => 'ショルダーバッグ',
                'description' => 'おしゃれなショルダーバッグ',
                'price' => 3500,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['10']),
                'condition' => 4,
                'item_name' => 'タンブラー',
                'description' => '使いやすいタンブラー',
                'price' => 500,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['10']),
                'condition' => 1,
                'item_name' => 'コーヒーミル',
                'description' => '手動のコーヒーミル',
                'price' => 4000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'categories' => json_encode(['1', '6']),
                'condition' => 2,
                'item_name' => 'メイクセット',
                'description' => '便利なメイクアップセット',
                'price' => 25000,
                'sale' => 0,
                'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg', // 画像URLを指定
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のアイテムも追加可能
        ];

        foreach ($items as $item) {
            // 各レコードに対する画像の取得
            $imageContents = Http::get($item['image_url'])->body();
            $imageName = Str::random(10) . '.jpg';
            $imagePath = 'images/' . $imageName;

            // 画像をストレージに保存
            Storage::disk('public')->put($imagePath, $imageContents);

            // データベースに挿入する前に `image_path` を設定
            unset($item['image_url']); // image_urlフィールドはデータベースに不要なので削除
            $item['image_path'] = $imagePath;

            DB::table('items')->insert($item);
        }
    }
}
