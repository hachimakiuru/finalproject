@extends('layouts.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/restaurant/google-map.css')  }}" >
    
@endpush


@include('parts.success-message')

<div class="container-fluid mt-3">

    <div class="card">
        <div class="card-header" id="searchHeading">
            <h5 class="mb-0">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#searchFormCollapse" aria-expanded="false" aria-controls="searchFormCollapse" id="searchFormButton">
                    <i class="ri-equalizer-line"></i>
                </button>             
            </h5>
        </div>
        
        <div id="searchFormCollapse" class="collapse" aria-labelledby="searchHeading">
            <div class="card-body">
                <form method="GET" id="searchForm">
                    <div class="row mb-3">
                        <label for="genre_place" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="genre_place" name="genre_place">
                                <option selected disabled>選択してください</option>
                                <option value="新宿">新宿</option>
                                 <option value="代々木">代々木</option>
                                 <option value="浅草">浅草</option>
                                 <option value="筑地">筑地</option>
                                 <option value="渋谷">渋谷</option>
                                 <option value="池袋">池袋</option>
                                 <option value="秋葉原">秋葉原</option>
                                 <option value="原宿">原宿</option>
                                 <option value="銀座">銀座</option>
                                 <option value="上野">上野</option>
                                 <option value="東京駅周辺">東京駅周辺</option>
                                 <option value="六本木">六本木</option>
                                 <option value="品川">品川</option>
                                 <option value="赤坂">赤坂</option>
                                 <option value="自由ヶ丘">自由ヶ丘</option>
                                 <option value="恵比寿">恵比寿</option>
                                 <option value="吉祥寺">吉祥寺</option>
                                 <option value="中野">中野</option>
                                 <option value="月島">月島</option>
                                 <option value="お台場">お台場</option>
                                 <option value="下北沢">下北沢</option>
                                 <!-- 他のオプションを追加 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre_variety" class="col-sm-2 col-form-label">Variety</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="genre_variety" name="genre_variety">
                                <option selected disabled>選択してください</option>
                                <option value="寿司">寿司</option>
                                <option value="天ぷら">天ぷら</option>
                                <option value="すき焼き">すき焼き</option>
                                <option value="しゃぶしゃぶ">しゃぶしゃぶ</option>
                                <option value="ラーメン">ラーメン</option>
                                <option value="お好み焼き">お好み焼き</option>
                                <option value="たこ焼き">たこ焼き</option>
                                <option value="和牛">和牛</option>
                                <option value="そば">そば</option>
                                <option value="うどん">うどん</option>
                                <option value="和菓子">和菓子</option>
                                <option value="焼き鳥">焼き鳥</option>
                                <option value="刺身">刺身</option>
                                <option value="おせち料理">おせち料理</option>
                                <option value="カツ丼">カツ丼</option>
                                <option value="イタリア料理">イタリア料理</option>
                                <option value="フランス料理">フランス料理</option>
                                <option value="スペイン料理">スペイン料理</option>
                                <option value="ドイツ料理">ドイツ料理</option>
                                <option value="中国料理">中国料理</option>
                                <option value="インド料理">インド料理</option>
                                <!-- 他のオプションを追加 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre_religion" class="col-sm-2 col-form-label">Limitation</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="genre_religion" name="genre_religion">
                                <option selected disabled>選択してください</option>
                                <option value="ベジタリアン対応">ベジタリアン対応</option>
                                <option value="ヴィーガン対応">ヴィーガン対応</option>
                                <option value="ハラルフード（ムスリム）">ハラルフード（ムスリム）</option>
                                <option value="コーシャフード（ユダヤ教）">コーシャフード（ユダヤ教）</option>
                                <option value="サトウキビ不使用">サトウキビ不使用</option>
                                <option value="グルテンフリー">グルテンフリー</option>
                                <option value="ラクトオボベジタリアン">ラクトオボベジタリアン</option>
                                <option value="オーガニックフード">オーガニックフード</option>
                                <option value="無添加食品">無添加食品</option>

                                <!-- 他のオプションを追加 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre_payment" class="col-sm-2 col-form-label">How to pay</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="genre_payment" name="genre_payment">
                                <option selected disabled>選択してください</option>
                                <option value="なんでもok">なんでもok</option>
                                <option value="現金のみ">現金のみ</option>
                                <option value="クレジットカード">クレジットカード不可</option>
                                <option value="電子マネー">電子マネー不可</option>
                                <!-- 他のオプションを追加 -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const searchFormCollapse = document.getElementById('searchFormCollapse');
    const searchFormButton = document.querySelector('[data-bs-target="#searchFormCollapse"]');
    let isCollapsed = true;

    document.addEventListener('click', function(event) {
        const isClickOutsideForm = !searchFormCollapse.contains(event.target);
        const isClickOnButton = event.target === searchFormButton;

        if (!isClickOnButton && !isCollapsed && isClickOutsideForm) {
            toggleCollapse();
        }
    });

    searchFormButton.addEventListener('click', function() {
        toggleCollapse();
    });

    function toggleCollapse() {
        const bsCollapse = new bootstrap.Collapse(searchFormCollapse);
        if (isCollapsed) {
            bsCollapse.show();
        } else {
            bsCollapse.hide();
        }
        isCollapsed = !isCollapsed;
    }
});

    </script>
    
    
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-right">
                    <div class="card">
                        <h6 class="card-header card-header-gmap"><i class="ri-map-pin-fill" style="margin-right: 5px;"></i>Get the Location</h6>
                    </div>
                    <div id="map1" style="height: 600px; width: 100%"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>レストラン一覧</h4>
                            <button type="button" class="btn btn-border-shadow-1 btn-border-shadow--color2-1 custom-btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Post ></button>
                        </div>

                        {{-- 投稿モーダル --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">レストラン投稿</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="username" class="col-sm-2 col-form-label">ユーザー名</label>
                                                <div class="col-sm-10">
                                                    <p>{{Auth::user()->name }}</p>
                                                    @error('user_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="storename" class="col-sm-2 col-form-label">店舗名</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="storename" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="pac-input" class="col-sm-2 col-form-label">住所</label>
                                                <div class="col-sm-10">
                                                    {{-- GoogleAPI Autcomplete --}}
                                                    <input type="text" id="pac-input" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"placeholder="Enter the full-location">
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <input type="" id="latitude" name="latitude" value="{{ old('latitude') }}" style="display: none;">
                                                <input type="" id="longitude" name="longitude" value="{{ old('longitude')}}" style="display: none;">
                                            </div>
                                            <div id="pac-container">
                                                <div id="map" style="display: none;"></div>
                                            </div>
                                            <div id="infowindow-content" style="display: none;">
                                                <img src="" width="16" height="16" id="place-icon" />
                                                <span id="place-name" class="title"></span><br/>
                                                <span id="place-address"></span>
                                            </div>
                                            {{-- ------------------ --}}
                                            <div class="mb-3 row">
                                                <label for="image" class="col-sm-2 col-form-label">写真</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="image" name="image_path" class="form-control @error('image_path') is-invalid @enderror" value="{{ old('image_path') }}">
                                                    @error('image_path')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="genre_place" class="col-sm-2 col-form-label">場所</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select @error('genre_place') is-invalid @enderror" id="genre_place" name="genre_place">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="新宿">新宿</option>
                                                        <option value="代々木">代々木</option>
                                                        <option value="浅草">浅草</option>
                                                        <option value="筑地">筑地</option>
                                                        <option value="渋谷">渋谷</option>
                                                        <option value="池袋">池袋</option>
                                                        <option value="秋葉原">秋葉原</option>
                                                        <option value="原宿">原宿</option>
                                                        <option value="銀座">銀座</option>
                                                        <option value="上野">上野</option>
                                                        <option value="東京駅周辺">東京駅周辺</option>
                                                        <option value="六本木">六本木</option>
                                                        <option value="品川">品川</option>
                                                        <option value="赤坂">赤坂</option>
                                                        <option value="自由ヶ丘">自由ヶ丘</option>
                                                        <option value="恵比寿">恵比寿</option>
                                                        <option value="吉祥寺">吉祥寺</option>
                                                        <option value="中野">中野</option>
                                                        <option value="月島">月島</option>
                                                        <option value="お台場">お台場</option>
                                                        <option value="下北沢">下北沢</option>
                                                        <!-- 他のオプションを追加 -->
                                                    </select>
                                                    @error('genre_place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="genre_variety" class="col-sm-2 col-form-label">種類</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select @error('genre_variety') is-invalid @enderror" id="genre_variety" name="genre_variety">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="寿司">寿司</option>
                                                        <option value="天ぷら">天ぷら</option>
                                                        <option value="すき焼き">すき焼き</option>
                                                        <option value="しゃぶしゃぶ">しゃぶしゃぶ</option>
                                                        <option value="ラーメン">ラーメン</option>
                                                        <option value="お好み焼き">お好み焼き</option>
                                                        <option value="たこ焼き">たこ焼き</option>
                                                        <option value="和牛">和牛</option>
                                                        <option value="そば">そば</option>
                                                        <option value="うどん">うどん</option>
                                                        <option value="和菓子">和菓子</option>
                                                        <option value="焼き鳥">焼き鳥</option>
                                                        <option value="刺身">刺身</option>
                                                        <option value="おせち料理">おせち料理</option>
                                                        <option value="カツ丼">カツ丼</option>
                                                        <option value="イタリア料理">イタリア料理</option>
                                                        <option value="フランス料理">フランス料理</option>
                                                        <option value="スペイン料理">スペイン料理</option>
                                                        <option value="ドイツ料理">ドイツ料理</option>
                                                        <option value="中国料理">中国料理</option>
                                                        <option value="インド料理">インド料理</option>
                                                        <!-- 他のオプションを追加 -->
                                                    </select>
                                                    @error('genre_variety')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="genre_religion" class="col-sm-2 col-form-label">食事制限</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select " id="genre_religion" name="genre_religion">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="ベジタリアン対応">ベジタリアン対応</option>
                                                        <option value="ヴィーガン対応">ヴィーガン対応</option>
                                                        <option value="ハラルフード（ムスリム）">ハラルフード（ムスリム）</option>
                                                        <option value="コーシャフード（ユダヤ教）">コーシャフード（ユダヤ教）</option>
                                                        <option value="サトウキビ不使用">サトウキビ不使用</option>
                                                        <option value="グルテンフリー">グルテンフリー</option>
                                                        <option value="ラクトオボベジタリアン">ラクトオボベジタリアン</option>
                                                        <option value="オーガニックフード">オーガニックフード</option>
                                                        <option value="無添加食品">無添加食品</option>
                                                        <option value="特になし">特に無し</option>
                                                        <!-- 他のオプションを追加 -->
                                                    </select>
                                                    {{-- @error('genre_religion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                 --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="genre_payment" class="col-sm-2 col-form-label">支払方法</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select " id="genre_payment" name="genre_payment">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="なんでもok">なんでもok</option>
                                                        <option value="現金のみ">現金のみ</option>
                                                        <option value="クレジットカード">クレジットカード不可</option>
                                                        <option value="電子マネー">電子マネー不可</option>
                                                        <!-- 他のオプションを追加 -->
                                                    </select>                
                                                    {{-- @error('genre_payment')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                 --}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn-border">Share</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         {{-- 投稿モーダル --}}
                        
                        {{-- indexの中身 --}}
                        <div class="card-body" style="overflow-y: auto; max-height: 92vh;">

                            @if($warning)
    <div class="alert border-dark" role="alert">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                {{ $warning }}
            </div>
            <div>
                <a href="{{ route('restaurants.index') }}" class="btn btn-outline-primary">Go back</a>
            </div>
        </div>
    </div>
@endif

                        
                        


                            <ul class="list-group">
                                @foreach ($restaurants as $restaurant)
                                <li class="list-group-item" style="background-color: #f8f9fa; border: 1px solid #ced4da; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <img src="{{ Storage::url($restaurant->image_path) }}" class="img-thumbnail" alt="restaurant photo" style="width: 100%; height: auto; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h5>{{ $restaurant->name }}</h5>
                                            <button class="btnGetDirection" onclick="getDirection({{ $restaurant->latitude }}, {{ $restaurant->longitude }})"><i class="ri-map-pin-fill"></i>{{ $restaurant->address }}</button>
                                            
                                            <p style="margin-left: 20px;">{{ $restaurant->genre_place }}</p>
                                            <!-- モーダルトリガーボタン -->
                                            <button type="button" class="btn btn-border-shadow btn-border-shadow--color2 custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $restaurant->id }}">
                                                Details & Reservation Form >
                                            </button>
                                            
                                            



                                            {{-- likeボタンの作成 --}}
                                            <div class="btn-container" id="target{{ $restaurant->id }}" style="font-size: 20px;">
                                                @if ($restaurant->isLike)
                                                    {{-- <form action="{{ route('like.destroy', $restaurant->id) }}" method="POST" class="likebutton">
                                                        @csrf
                                                        @method('DELETE') --}}
                                                        <button id="unlike"  onclick="unlikeRestaurant({{ $restaurant->id }})"><i class="ri-heart-fill"></i></button>
                                                    {{-- </form> --}}
                                                @else
                                                    {{-- <form action="{{ route('like.store', $restaurant->id) }}" method="POST" class="likebutton"> --}}
                                                        {{-- @csrf --}}
                                                        <button id="like" class="unlike" onclick="likeRestaurant({{ $restaurant->id }})"><i class="ri-heart-line"></i></button>
                                                    {{-- </form> --}}
                                                @endif
                                            </div>
                                            {{-- likeボタンの作成 --}}


                                            <!-- modal content -->
                                            <div class="modal fade" id="exampleModal_{{ $restaurant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 90%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Details & Reservation Form</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {{-- モーダルbody --}}
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="d-flex flex-column flex-md-row align-items-center"> <!-- detailとformを垂直方向に配置 -->
                                                                    <div class="detail p-4">
                                                                        <!-- detailの内容 -->
                                                                        <div class="detail">
                                                                            <div class="row">
                                                                                <div class="col-md-13">
                                                                                    <!-- 写真と詳細情報 -->
                                                                                    <div class="text-center">
                                                                                        <img src="{{ Storage::url($restaurant->image_path) }}" class="img-fluid rounded shadow-lg" alt="restaurant photo">
                                                                                    </div>
                                                                                    <p><strong>ユーザー名:</strong> {{ $restaurant->user->name }}</p>
                                                                                    <p><strong>店舗名:</strong> {{ $restaurant->name }}</p>
                                                                                    <p><strong>住所:</strong> {{ $restaurant->address }}</p>
                                                                                    <p><strong>エリア:</strong> {{ $restaurant->genre_place }}</p>
                                                                                    <p><strong>ジャンル:</strong> {{ $restaurant->genre_variety }}</p>
                                                                                    <p><strong>食事制限:</strong> {{ $restaurant->genre_religion }}</p>
                                                                                    <p><strong>支払方法:</strong> {{ $restaurant->genre_payment }}</p>
                                                                                </div>
                                                                                <!-- コメント部分 -->
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            @if ($restaurant->comments->count() > 0)
                                                                                                <div class="card">
                                                                                                    <div class="card-header">
                                                                                                        <h3 class="card-title">Review</h3>
                                                                                                    </div>
                                                                                                    <div class="card-body" style="overflow-y: auto; max-height: 300px;">
                                                                                                        <div class="list-group">
                                                                                                            @foreach ($restaurant->comments as $comment)
                                                                                                            <div class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                                                                                                <div>
                                                                                                                    <!-- 制限されたテキスト -->
                                                                                                                    <div id="comment-{{ $comment->id }}-short">
                                                                                                                        <p>{{ substr($comment->comment, 0, 20) }}...</p>
                                                                                                                        <!-- 「もっと読む」ボタン -->
                                                                                                                        <a href="#" onclick="toggleFullText('{{ $comment->id }}', true)" id="read-more-{{ $comment->id }}">Read more</a>
                                                                                                                    </div>
                                                                                                                    <!-- フルテキスト（最初は非表示） -->
                                                                                                                    <div id="comment-{{ $comment->id }}-full" style="display: none";>
                                                                                                                    <p>{{ $comment->comment }}</p>
                                                                                                                    <!-- 「閉じる」ボタン -->
                                                                                                                    <a href="#" onclick="toggleFullText('{{ $comment->id }}', false)" id="read-less-{{ $comment->id }}">Close</a>
                                                                                                                </div>

                                                                                                                </div>
                                                                                                                @if(Auth::check() && (Auth::user()->id === $restaurant->user_id || Auth::user()->role_id === 1))
                                                                                                                    <form method="POST" action="{{ route('restaurant_comments.destroy', $comment->id) }}">
                                                                                                                        @csrf
                                                                                                                        @method('DELETE')
                                                                                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                                                                    </form>
                                                                                                                @endif
                                                                                                            </div>
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @else
                                                                                            <div class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                                                                                <p>Please write your reviews or comments</p>
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <script>
                                                                                    // 「もっと読む」ボタンまたは「閉じる」ボタンがクリックされたときに実行される関数
                                                                                    function toggleFullText(commentId, showFull) {
                                                                                        // 対応するコメントの短縮テキストとフルテキストを切り替えて表示
                                                                                        document.getElementById('comment-' + commentId + '-short').style.display = showFull ? 'none' : 'block';
                                                                                        document.getElementById('comment-' + commentId + '-full').style.display = showFull ? 'block' : 'none';
                                                                                        // 「もっと読む」ボタンと「閉じる」ボタンを切り替えて表示
                                                                                        document.getElementById('read-more-' + commentId).style.display = showFull ? 'none' : 'inline';
                                                                                        document.getElementById('read-less-' + commentId).style.display = showFull ? 'inline' : 'none';
                                                                                    }
                                                                                </script>
                                                                                
                                                                                <div class="row mt-5 justify-content-start"> <!-- コメントフォームを左寄せに配置 -->
                                                                                    <div class="col-md-8"> <!-- col-md-6 から col-md-8 に変更 -->
                                                                                        @if (Auth::check())
                                                                                            <form method="POST" action="{{ route('restaurant_comments.store') }}">
                                                                                                @csrf
                                                                                                <input type="hidden" name="restaurant_post_id" value="{{ $restaurant->id }}">
                                                                                                <div class="mb-3">
                                                                                                    <label for="comment" class="form-label"><h3>Review</h3></label>
                                                                                                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="You can write your comments here"></textarea>
                                                                                                </div>
                                                                                                <button type="submit" class="btn-border">Comment</button>
                                                                                            </form>
                                                                                        @else
                                                                                            <p>You can write your comments here</p>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                                

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form bg-light p-5 rounded ms-md-4" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 400px;">
                                                                        <h2 class="mb-4 text-center" style="font-size: 1.5rem; color: #333;">Reservation Form</h2>
                                                                    
                                                                        <!-- 予約フォーム -->
                                                                        <div class="booking">
                                                                            <form action="{{ route('rbooking.store') }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="restaurant_post_id" value="{{ $restaurant->id }}">
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="day">希望日:</label>
                                                                                    <input type="date" id="day" name="day" class="form-control" value="#" required>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="time1">第一希望時間:</label>
                                                                                    <select id="time1" name="time1" class="form-control" required>
                                                                                        <option value="">-- 時間を選択してください --</option>
                                                                                        <optgroup label="朝 (6:00 - 11:59)">
                                                                                            @for ($hour = 6; $hour < 12; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="昼 (12:00 - 17:59)">
                                                                                            @for ($hour = 12; $hour < 18; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="夕方 (18:00 - 21:59)">
                                                                                            @for ($hour = 18; $hour < 22; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="夜 (22:00 - 23:59)">
                                                                                            @for ($hour = 22; $hour < 24; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <!-- 時間のオプション -->
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="time2">第二希望時間:</label>
                                                                                    <select id="time2" name="time2" class="form-control" required>
                                                                                        <option value="">-- 時間を選択してください --</option>
                                                                                        <optgroup label="朝 (6:00 - 11:59)">
                                                                                            @for ($hour = 6; $hour < 12; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="昼 (12:00 - 17:59)">
                                                                                            @for ($hour = 12; $hour < 18; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="夕方 (18:00 - 21:59)">
                                                                                            @for ($hour = 18; $hour < 22; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <optgroup label="夜 (22:00 - 23:59)">
                                                                                            @for ($hour = 22; $hour < 24; $hour++)
                                                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                                                            @endfor
                                                                                        </optgroup>
                                                                                        <!-- 時間のオプション -->
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="number_guests">ゲスト人数:</label>
                                                                                    <select id="number_guests" name="number_guests" class="form-control" required>
                                                                                        <option value="">-- 選択してください --</option>
                                                                                        <option value="1">1人</option>
                                                                                        <option value="2">2人</option>
                                                                                        <option value="3">3人</option>
                                                                                        <option value="4">4人</option>
                                                                                        <option value="5">5人</option>
                                                                                        <option value="6">6人</option>
                                                                                        <option value="7">7人</option>
                                                                                        <option value="8">8人</option>
                                                                                        <option value="9">9人</option>
                                                                                        <option value="10">10人以上</option>
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3">
                                                                                    <label for="memo">メモ:</label>
                                                                                    <textarea id="memo" name="memo" class="form-control"></textarea>
                                                                                </div>
                                                                                
                                                                                <div class="d-grid">
                                                                                    <button type="submit" class="btn-border">Make a Reservation</button>
                                                                                </div>
                                                                                
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                        </div>
                                                        {{-- footer --}}
                                                        <div class="modal-footer">
                                                            <div class="container-fluid">
                                                                <div class="row justify-content-between align-items-center">
                                                                    <div class="col-md-auto">
                                                                        @if(Auth::check() && (Auth::user()->id === $restaurant->user_id || Auth::user()->role_id === 1))
                                                                        {{-- <form action="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}">  --}}
                                                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $restaurant->id }}">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </button>
                                                                        {{-- </form> --}}
                                                                        @endif 
                                                                    </div>                                                        
                                                                    <div class="col-md-auto">
                                                                        <div class="btn-group" role="group" aria-label="アクション">
                                                                            @if(Auth::check() && (Auth::user()->id === $restaurant->user_id || Auth::user()->role_id === 1))
                                                                            <form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </li>

                                {{-- edit --}}
                                    <div class="modal fade" id="exampleModal{{ $restaurant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Editing your post</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="redirectToIndex()"></button>

                                                <script>
                                                    function redirectToIndex() {
                                                        window.location.href = "{{ route('restaurants.index') }}";
                                                    }
                                                </script>
                                            </div>

                                            <div class="modal-body" >
                                              {{-- ...yawa --}}
                                              <form action="{{ route('restaurants.update', ['restaurant' => $restaurant]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3 row">
                                                    <label for="username" class="col-sm-2 col-form-label">ユーザー名</label>
                                                    <div class="col-sm-10">
                                                        <p>{{Auth::user()->name }}</p>
                                                        @error('user_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="storename" class="col-sm-2 col-form-label">店舗名</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="storename" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $restaurant->name }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="image" class="col-sm-2 col-form-label">写真</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" id="image" name="image_path" class="form-control @error('image_path') is-invalid @enderror" value="{{ $restaurant->image_path }}">
                                                        @error('image_path')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="genre_place" class="col-sm-2 col-form-label">場所</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select @error('genre_place') is-invalid @enderror" id="genre_place" name="genre_place">
                                                            <option selected disabled>選択してください</option>
                                                            <option value="新宿">新宿</option>
                                                            <option value="代々木">代々木</option>
                                                            <option value="浅草">浅草</option>
                                                            <option value="筑地">筑地</option>
                                                            <option value="渋谷">渋谷</option>
                                                            <option value="池袋">池袋</option>
                                                            <option value="秋葉原">秋葉原</option>
                                                            <option value="原宿">原宿</option>
                                                            <option value="銀座">銀座</option>
                                                            <option value="上野">上野</option>
                                                            <option value="東京駅周辺">東京駅周辺</option>
                                                            <option value="六本木">六本木</option>
                                                            <option value="品川">品川</option>
                                                            <option value="赤坂">赤坂</option>
                                                            <option value="自由ヶ丘">自由ヶ丘</option>
                                                            <option value="恵比寿">恵比寿</option>
                                                            <option value="吉祥寺">吉祥寺</option>
                                                            <option value="中野">中野</option>
                                                            <option value="月島">月島</option>
                                                            <option value="お台場">お台場</option>
                                                            <option value="下北沢">下北沢</option>
                                                            <!-- 他のオプションを追加 -->
                                                        </select>
                                                        @error('genre_place')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror                
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="genre_variety" class="col-sm-2 col-form-label">種類</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select @error('genre_variety') is-invalid @enderror" id="genre_variety" name="genre_variety">
                                                            <option selected disabled>選択してください</option>
                                                            <option value="寿司">寿司</option>
                                                            <option value="天ぷら">天ぷら</option>
                                                            <option value="すき焼き">すき焼き</option>
                                                            <option value="しゃぶしゃぶ">しゃぶしゃぶ</option>
                                                            <option value="ラーメン">ラーメン</option>
                                                            <option value="お好み焼き">お好み焼き</option>
                                                            <option value="たこ焼き">たこ焼き</option>
                                                            <option value="和牛">和牛</option>
                                                            <option value="そば">そば</option>
                                                            <option value="うどん">うどん</option>
                                                            <option value="和菓子">和菓子</option>
                                                            <option value="焼き鳥">焼き鳥</option>
                                                            <option value="刺身">刺身</option>
                                                            <option value="おせち料理">おせち料理</option>
                                                            <option value="カツ丼">カツ丼</option>
                                                            <option value="イタリア料理">イタリア料理</option>
                                                            <option value="フランス料理">フランス料理</option>
                                                            <option value="スペイン料理">スペイン料理</option>
                                                            <option value="ドイツ料理">ドイツ料理</option>
                                                            <option value="中国料理">中国料理</option>
                                                            <option value="インド料理">インド料理</option>
                                                            <!-- 他のオプションを追加 -->
                                                        </select>
                                                        @error('genre_variety')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror                
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="genre_religion" class="col-sm-2 col-form-label">食事制限</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select " id="genre_religion" name="genre_religion">
                                                            <option selected disabled>選択してください</option>
                                                            <option value="ベジタリアン対応">ベジタリアン対応</option>
                                                            <option value="ヴィーガン対応">ヴィーガン対応</option>
                                                            <option value="ハラルフード（ムスリム）">ハラルフード（ムスリム）</option>
                                                            <option value="コーシャフード（ユダヤ教）">コーシャフード（ユダヤ教）</option>
                                                            <option value="サトウキビ不使用">サトウキビ不使用</option>
                                                            <option value="グルテンフリー">グルテンフリー</option>
                                                            <option value="ラクトオボベジタリアン">ラクトオボベジタリアン</option>
                                                            <option value="オーガニックフード">オーガニックフード</option>
                                                            <option value="無添加食品">無添加食品</option>
                                                            <option value="特になし">特に無し</option>
                                                            <!-- 他のオプションを追加 -->
                                                        </select>
                                                        {{-- @error('genre_religion')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror                 --}}
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="genre_payment" class="col-sm-2 col-form-label">支払方法</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select " id="genre_payment" name="genre_payment">
                                                            <option selected disabled>選択してください</option>
                                                            <option value="なんでもok">なんでもok</option>
                                                            <option value="現金のみ">現金のみ</option>
                                                            <option value="クレジットカード">クレジットカード不可</option>
                                                            <option value="電子マネー">電子マネー不可</option>
                                                            <!-- 他のオプションを追加 -->
                                                        </select>                
                                                        {{-- @error('genre_payment')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror                 --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Change the contents</button>
                                            </div>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- edit --}}

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- GoogleMap Autocomplete --}}
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbtmHh4zHJMzxxH7893O9DmuaNWZQewy0&callback=initMap&libraries=places&v=weekly"
     async defer
    ></script>
    
    {{-- GoogleMap Autocomplete --}}
 <script async>
    var map1
    // This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
const map = new google.maps.Map(document.getElementById("map"), {
  // center: { lat: 50.064192, lng: -130.605469 },
  center: { lat: 35.6895, lng: 139.6917 }, // 東京の座標を設定
  // zoom: 3,
  zoom: 6, // 適切なズームレベルを設定
});

map1 = new google.maps.Map(document.getElementById("map1"), {
    center: new google.maps.LatLng(35.6895, 139.6917),
    zoom: 7,
    });

const card = document.getElementById("pac-card");

map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

const center = { lat: 50.064192, lng: -130.605469 };
// Create a bounding box with sides ~10km away from the center point
const defaultBounds = {
  north: center.lat + 0.1,
  south: center.lat - 0.1,
  east: center.lng + 0.1,
  west: center.lng - 0.1,
};
const input = document.getElementById("pac-input");
const options = {
  bounds: defaultBounds,
  // componentRestrictions: { country: "us" },
  componentRestrictions: { country: "jp" },
  fields: ["address_components", "geometry", "icon", "name"],
  strictBounds: false,
};
const autocomplete = new google.maps.places.Autocomplete(input, options);

// Set initial restriction to the greater list of countries.
autocomplete.setComponentRestrictions({
  // country: ["us", "pr", "vi", "gu", "mp"],
  country: ["jp"],
});

const southwest = { lat: 5.6108, lng: 136.589326 };
const northeast = { lat: 61.179287, lng: 2.64325 };
const newBounds = new google.maps.LatLngBounds(southwest, northeast);

autocomplete.setBounds(newBounds);

const infowindow = new google.maps.InfoWindow();
const infowindowContent = document.getElementById("infowindow-content");

infowindow.setContent(infowindowContent);

const marker = new google.maps.Marker({
  map,
  anchorPoint: new google.maps.Point(0, -29),
});




autocomplete.addListener("place_changed", () => {
  infowindow.close();
  marker.setVisible(false);

  const place = autocomplete.getPlace();

  if (!place.geometry || !place.geometry.location) {
    // User entered the name of a Place that was not suggested and
    // pressed the Enter key, or the Place Details request failed.
    window.alert("No details available for input: '" + place.name + "'");
    return;
  }

  // If the place has a geometry, then present it on a map.
  if (place.geometry.viewport) {
    map.fitBounds(place.geometry.viewport);
  } else {
    map.setCenter(place.geometry.location);
    map.setZoom(17); // Why 17? Because it looks good.
  }

  marker.setPosition(place.geometry.location);
  marker.setVisible(true);

  let address = "";

  if (place.address_components) {
    address = [
      (place.address_components[0] &&
        place.address_components[0].short_name) ||
        "",
      (place.address_components[1] &&
        place.address_components[1].short_name) ||
        "",
      (place.address_components[2] &&
        place.address_components[2].short_name) ||
        "",
    ].join(" ");
  }

  infowindowContent.children["place-icon"].src = place.icon;
  infowindowContent.children["place-name"].textContent = place.name;
  infowindowContent.children["place-address"].textContent = address;
  infowindow.open(map, marker);
//   追加
  document.getElementById('latitude').value = place.geometry.location.lat();
  document.getElementById('longitude').value = place.geometry.location.lng();
});


// Sets a listener on a given radio button. The radio buttons specify
// the countries used to restrict the autocomplete search.
function setupClickListener(id, countries) {
  const radioButton = document.getElementById(id);

  radioButton.addEventListener("click", () => {
    autocomplete.setComponentRestrictions({ country: countries });
  });
}

setupClickListener("changecountry-usa", "us");
setupClickListener("changecountry-usa-and-uot", [
  "us",
  "pr",
  "vi",
  "gu",
  "mp",
]);
}



window.initMap = initMap;

function getDirection(lat, lng) {
    map1 = new google.maps.Map(document.getElementById("map1"), {
        zoom: 13,
        center: { lat: lat, lng: lng },
    })

    const marker1 = new google.maps.Marker({
    map1,
    });

    marker1.setPosition({lat, lng});
    marker1.setVisible(true);
    marker1.setMap(map1)


    console.log(marker1)


}
  </script>

  <script>

var map

function test() {



}
google.maps.event.addDomListener(window, 'load', test)


  </script>

  {{-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbtmHh4zHJMzxxH7893O9DmuaNWZQewy0&callback=initMap&libraries=places&v=weekly"
    async
    defer
    ></script> --}}
    


<script>
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


function likeRestaurant(id) {
    

    $.ajax({
        type: 'POST',
        url: `/restaurant/like/${id}`,
        success: function(data) {
            $(`#target${id}`).empty();
            var $button = $('<button></button>', {
                id: 'unlike',
                html: '<i class="ri-heart-fill"></i>',
                click: function() { unlike(id); }
            });
            $(`#target${id}`).append($button);
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
}

function unlikeRestaurant(id) {

    $.ajax({
        type: 'DELETE',
        url: `/restaurant/unlike/${id}`,
        success: function(data) {
            $(`#target${id}`).empty();
            var $button = $('<button></button>', {
                id: 'like',
                html: '<i class="ri-heart-line"></i>',
                click: function() { like(id); }
            });
            $(`#target${id}`).append($button);
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
}
</script>

@endsection