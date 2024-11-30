<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/itemdetail.css') }}">
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

    <!-- 商品詳細 -->
    <div class="product-container">
        <!-- 商品画像 -->
        <div class="product-image">
            <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像">
        </div>

        <!-- 商品情報 -->
        <div class="product-details">
            <h1>{{ $item->name }}</h1>
            <p class="brand">{{ $item->brand }}</p>
            <p class="price">¥{{ number_format($item->price) }} <span>(税込)</span></p>
            <!-- <button class="purchase-button">購入手続きへ</button> -->
            <button class="purchase-button">
                <a href="{{ route('purchase.show', ['id' => $item->id]) }}" style="text-decoration: none; color: white;">購入手続きへ</a>
            </button>

            <!-- 商品説明 -->
            <div class="description">
                <h2>商品説明</h2>
                <p>{{ $item->description }}</p>
            </div>

            <!-- 商品の情報 -->
            <div class="product-info">
                <h2>商品の情報</h2>
                <p>カテゴリー: <span>{{ $item->category }}</span></p>
                <p>商品の状態: <span>{{ $item->condition }}</span></p>
            </div>

            <!-- コメント -->
            <div class="comments">
                <h2>コメント ({{ $comments->count() }})</h2>

                <!-- コメント一覧 -->
                @foreach ($comments as $comment)
                    <div class="comment">
                        <div class="comment-user">{{ $comment->user_name }}</div>
                        <div class="comment-body">{{ $comment->content }}</div>
                    </div>
                @endforeach

                    <!-- 成功メッセージ -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- バリデーションエラーの表示 -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- コメント投稿フォーム -->
                <form action="{{ route('comments.store') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    
                    <div>
                        <label for="user_name">お名前</label>
                        @auth
                            <input type="text" id="user_name" name="user_name" value="{{ auth()->user()->name }}" readonly>
                        @else
                            <input type="text" id="user_name" name="user_name" required>
                        @endauth
                    </div>

                    <div>
                        <label for="content">コメント内容</label>
                        <textarea id="content" name="content" required></textarea>
                    </div>

                    <button type="submit" class="comment-submit">コメントを投稿する</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
