<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('mypage.profile'); // プロフィール編集画面のビュー
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // 現在のログインユーザーを取得

        // 入力値のバリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'postal_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'building_name' => 'nullable|string|max:255',
            // 'image' => 'nullable|image|max:2048', // 画像ファイルのバリデーション
        ]);

        // ユーザー情報の更新
        $user->name = $validated['name'];
        // $user->postal_code = $validated['postal_code'] ?? null;
        $user->address = $validated['address'] ?? null;
        $user->building = $validated['building'] ?? null;
        // $user->building_name = $validated['building_name'] ?? null;

        // プロフィール画像の保存（任意）
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            $user->profile_image = $path; // テーブルに画像のパスを保存（カラム名に応じて変更）
        }

        // データベースを更新
        $user->save();

        // 成功メッセージとともにリダイレクト
        return redirect()->route('item.index')->with('success', 'プロフィールを更新しました。');
        // return redirect()->route('profile.edit')->with('success', 'プロフィールを更新しました。');
    }    
}
