<?php

namespace App\Http\Controllers;
use App\Models\Item; // Itemモデルをインポート
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Auth ファサードをインポート
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // アイテム一覧を表示する
    public function index()
    {
        $recommendedItems = Item::all(); // 全商品を取得
    
        // マイリストを安全に取得（null対応）
        $mylistItems = [];
        if (auth()->check()) {
            $orders = Auth::user()->orders; // ユーザーの orders リレーションを取得
    
            // null チェックを追加
            if ($orders && $orders->isNotEmpty()) {
                $mylistItems = $orders->map(function ($order) {
                    return $order->item; // 各注文に関連付けられた商品を取得
                });
            }
        }
    
        return view('itemlist', compact('recommendedItems', 'mylistItems'));
    }
    
     // 特定のアイテムの詳細を表示する
     public function show($id)
     {
        Log::info("ItemController@show called with ID: " . $id);
        
        //  $item = Item::findOrFail($id); // 指定IDのアイテムを取得
        //  $comments = Comment::where('item_id', $id)->get(); // アイテムに関連するコメントを取得
 
        //  return view('itemdetail', compact('item', 'comments'));

         $item = Item::with('comments')->findOrFail($id); // 商品とコメントを取得
         $comments = $item->comments; // コメントリスト
         return view('itemdetail', compact('item', 'comments'));
     }
}
