<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;

// ログインと登録のルート
Fortify::loginView(fn () => view('auth.login'));
Fortify::registerView(fn () => view('auth.register'));

// ログアウト
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// コメント登録
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// プロフィール関連ルート
Route::get('/mypage/profile', [ProfileController::class, 'edit'])
    ->middleware('auth') // ログイン必須
    ->name('mypage.profile');

Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Fortifyの登録ルートをカスタムコントローラーに置き換え
Route::post('/register', [CustomRegisteredUserController::class, 'store'])->name('register');

// 商品関連ルート
Route::get('/', [ItemController::class, 'index'])->name('item.index');
// Route::get('/item/{id}', [ItemController::class, 'show'])
//     ->where('id', '[0-9]+') // IDは数値のみ許可
//     ->name('item.show');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

    // Route::get('/item/{id}', function ($id) {
    //     return view('itemdetail', ['id' => $id]);
    // })->name('item.show');
    
// 購入関連ルート
Route::get('/purchase/{id}', [PurchaseController::class, 'show'])->name('purchase.show');
// Route::get('/purchase/{id}', [PurchaseController::class, 'show'])
//     ->where('id', '[0-9]+') // IDは数値のみ許可
//     ->name('purchase.show');
Route::get('/purchase/address', fn () => view('purchase_address'))->name('purchase.address');

// コメント投稿ルート
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

