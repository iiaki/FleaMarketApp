<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定</title>
    <!-- CSS のリンク -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="profile-container">
        <h1>プロフィール設定</h1>
        <a href="#" class="change-photo">画像を変更する</a>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('POST')

            <!-- ユーザー名 -->
            <!-- <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" value="{{ old('username', auth()->user()->name) }}" required> -->
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>

            <!-- 郵便番号 -->
            <label for="postal_code">郵便番号</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>

            <!-- 住所 -->
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required>

            <!-- 建物名 -->
            <label for="building">建物名</label>
            <input type="text" id="building_name" name="building_name" value="{{ old('building_name') }}">

            <!-- 更新ボタン -->
            <button type="submit">更新する</button>
        </form>
    </div>
</body>
</html>
