<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <!-- CSS のリンク -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="register-container">
        <h1>ログイン</h1>

        <!-- ログインフォーム -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- メールアドレス -->
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- パスワード -->
            <div>
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- ログインボタン -->
            <button type="submit">ログイン</button>
        </form>

        <!-- 登録リンク -->
        <div class="register-link">
            <p>アカウントをお持ちでないですか？ <a href="{{ route('register') }}">新規登録</a></p>
        </div>
    </div>
</body>
</html>
