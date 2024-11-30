<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/itemlist.css') }}">
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

    <!-- コンテンツ -->
    <div class="container">
        <!-- タブ切り替え -->
        <ul class="tabs">
            <li id="recommend-tab" class="{{ auth()->check() ? '' : 'active' }}">おすすめ</li>
            @auth
                <li id="mylist-tab" class="{{ auth()->check() ? 'active' : '' }}">マイリスト</li>
            @endauth
        </ul>

        <div class="content">
            <!-- おすすめタブの内容 -->
            <div id="recommend-content" class="tab-content {{ auth()->check() ? 'hidden' : '' }}">
                <h2>おすすめ商品</h2>
                <div class="items">
                    @foreach ($recommendedItems as $item)
                        <div class="item">
                            <a href="{{ route('item.show', ['id' => $item->id]) }}">
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像">
                            </a>
                            <p>{{ $item->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- マイリストタブの内容 -->
            @auth
                <div id="mylist-content" class="tab-content {{ auth()->check() ? '' : 'hidden' }}">
                    <h2>マイリスト</h2>
                    <div class="items">
                        @if ($mylistItems && $mylistItems->isNotEmpty())
                            @foreach ($mylistItems as $item)
                                <div class="item">
                                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像">
                                    </a>
                                    <p>{{ $item->name }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="no-items">マイリストには商品がありません。</p>
                        @endif
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <!-- タブ切り替えスクリプト -->
    <script>
        const recommendTab = document.getElementById('recommend-tab');
        const mylistTab = document.getElementById('mylist-tab');
        const recommendContent = document.getElementById('recommend-content');
        const mylistContent = document.getElementById('mylist-content');

        function initializeTabDisplay() {
            if (recommendTab.classList.contains('active')) {
                recommendContent.classList.remove('hidden');
                mylistContent?.classList.add('hidden');
            }
            if (mylistTab?.classList.contains('active')) {
                mylistContent.classList.remove('hidden');
                recommendContent.classList.add('hidden');
            }
        }

        initializeTabDisplay();

        recommendTab.addEventListener('click', function () {
            recommendContent.classList.remove('hidden');
            mylistContent?.classList.add('hidden');
            recommendTab.classList.add('active');
            mylistTab?.classList.remove('active');
        });

        mylistTab?.addEventListener('click', function () {
            mylistContent.classList.remove('hidden');
            recommendContent.classList.add('hidden');
            mylistTab.classList.add('active');
            recommendTab.classList.remove('active');
        });
    </script>
</body>
</html>
