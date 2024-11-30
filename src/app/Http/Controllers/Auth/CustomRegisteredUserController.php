<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

class CustomRegisteredUserController extends RegisteredUserController
{
    /**
     * オーバーライドした store メソッド
     *
     * @param Request $request
     * @param CreatesNewUsers $creator
     * @return RegisterResponse
     */
    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
    {
        // ユーザー作成
        $user = $creator->create($request->all());

        // 登録イベントを発火
        event(new Registered($user));

        // ユーザーをログイン状態にする
        Auth::login($user);

        // RegisterResponseを返す
        return app(RegisterResponse::class);
    }
}
