<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>住所変更画面</title>
    <!-- CSSファイルのリンク -->
    <link rel="stylesheet" href="{{ asset('css/purchase_address.css') }}">
</head>
<body>
    <!-- ナビゲーションバー -->
    <div class="navbar">
        <div class="logo">COACHTECH</div>
        <input type="text" placeholder="何をお探しですか？">
        <div class="menu">
            <a href="#">ログアウト</a>
            <a href="#">マイページ</a>
            <a href="#">出品</a>
        </div>
    </div>

    <!-- 住所変更フォームコンテナ -->
    <div class="address-edit-container">
        <h1>住所の変更</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="postal_code">郵便番号</label>
                <input type="text" id="postal_code" name="postal_code" placeholder="郵便番号">
            </div>
            <div class="form-group">
                <label for="address">住所</label>
                <input type="text" id="address" name="address" placeholder="住所">
            </div>
            <div class="form-group">
                <label for="name">宛名</label>
                <input type="text" id="name" name="name" placeholder="宛名">
            </di
