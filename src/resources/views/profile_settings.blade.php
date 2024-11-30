<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定</title>
    <link rel="stylesheet" href="{{ asset('css/profile_settings.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="logo">COACHTECH</div>
        <input type="text" placeholder="何をお探しですか？">
        <div class="menu">
            <a href="#">ログアウト</a>
            <a href="#">マイページ</a>
            <a href="#">出品</a>
        </div>
    </div>

    <div class="container">
        <h1>プロフィール設定</h1>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="profile-picture">
                <label for="image">画像を選択する</label>
                <input type="file" id="image" name="image">
            </div>

            <div>
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="postal_code">郵便番号</label>
                <input type="text" id="postal_code" name="postal_code">
            </div>

            <div>
                <label for="address">住所</label>
                <input type="text" id="address" name="address">
            </div>

            <div>
                <label for="building_name">建物名</label>
                <input type="text" id="building_name" name="building_name">
            </div>

            <div>
                <button type="submit">更新する</button>
            </div>
        </form>
    </div>
</body>
</html>
