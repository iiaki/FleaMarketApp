<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品購入</title>
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
</head>
<body>
    <!-- ナビゲーションバー -->
    <div class="navbar">
        <div class="logo">COACHTECH</div>
        <input type="text" placeholder="何をお探しですか？">
        <div class="menu">
            @auth
                <span class="username">{{ auth()->user()->name }} 様</span>
                <a href="{{ route('logout') }}">ログアウト</a>
                <a href="{{ route('mypage.profile') }}">マイページ</a>
            @else
                <a href="{{ route('login') }}">ログイン</a>
                <a href="{{ route('register') }}">新規登録</a>
            @endauth
        </div>
    </div>

    <!-- 商品購入画面 -->
    <div class="purchase-container">
        <!-- 左側: 購入情報 -->
        <div class="purchase-info">
            <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像" class="product-image">
            <h1>{{ $item->name }}</h1>
            <p class="price">¥{{ number_format($item->price) }}</p>

            <hr>

            <!-- 支払い方法 -->
            <label for="payment-method">支払い方法</label>
            <select id="payment-method" name="payment_method" onchange="updatePaymentMethod()">
                <option value="コンビニ払い">コンビニ払い</option>
                <option value="カード払い">カード払い</option>
            </select>

            <!-- 配送情報 -->
            <div class="delivery-info">
                <label for="address">配送先</label>
                <p>
                    @auth
                        〒{{ auth()->user()->postal_code }}<br>
                        {{ auth()->user()->address }} {{ auth()->user()->building_name }}
                    @else
                        ログインしていません。
                    @endauth
                </p>
                @auth
                    <a href="{{ route('mypage.profile') }}" class="edit-address">配送先を変更する</a>
                @endauth
            </div>
        </div>

        <!-- 右側: 支払い概要 -->
        <div class="payment-summary">
            <h2>購入概要</h2>
            <p>商品名: <span id="item-name">{{ $item->name }}</span></p>
            <p>商品金額: ¥<span id="item-price">{{ number_format($item->price) }}</span></p>
            <p>支払い方法: <span id="selected-payment-method">コンビニ払い</span></p>
            <button class="confirm-button">購入する</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function updatePaymentMethod() {
            const paymentMethod = document.getElementById('payment-method').value;
            const paymentMethodDisplay = document.getElementById('selected-payment-method');
            paymentMethodDisplay.textContent = paymentMethod;
        }
    </script>
</body>
</html>
