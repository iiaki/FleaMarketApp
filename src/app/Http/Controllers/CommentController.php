<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * コメントを保存する処理
     */
    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id', // アイテムIDが必須で、itemsテーブルに存在する必要がある
            'user_name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        // コメントの保存
        Comment::create([
            'item_id' => $validatedData['item_id'],
            'user_name' => $validatedData['user_name'],
            'content' => $validatedData['content'],
        ]);

        // 成功メッセージをセッションに保存
        return redirect()->back()->with('success', 'コメントが投稿されました！');
    }
}
