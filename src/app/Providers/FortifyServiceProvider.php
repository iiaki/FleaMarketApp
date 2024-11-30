<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 登録後のリダイレクト先をカスタマイズ
        $this->app->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    // プロフィール設定画面へリダイレクト
                    return redirect()->route('mypage.profile');
                }
            };
        });

        // CreatesNewUsersインターフェースに具体クラスをバインド
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);

        // 登録後のレスポンスをカスタマイズ
        $this->app->singleton(\Laravel\Fortify\Contracts\RegisterResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\RegisterResponse {
                public function toResponse($request)
                {
                    // プロフィール編集画面へリダイレクト
                    return redirect()->route('mypage.profile');
                }
            };
        });
    }
}
