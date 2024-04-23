@extends('layouts.layout')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-right">
                    <h6>mapping</h6>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>レストラン一覧</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">投稿</button>
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
                                                <label for="address" class="col-sm-2 col-form-label">住所</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
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
                                                    <select class="form-select @error('genre_religion') is-invalid @enderror" id="genre_religion" name="genre_religion">
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
                                                    @error('genre_religion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="genre_payment" class="col-sm-2 col-form-label">支払方法</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select @error('genre_payment') is-invalid @enderror" id="genre_payment" name="genre_payment">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="なんでもok">なんでもok</option>
                                                        <option value="現金のみ">現金のみ</option>
                                                        <option value="クレジットカード">クレジットカード不可</option>
                                                        <option value="電子マネー">電子マネー不可</option>
                                                        <!-- 他のオプションを追加 -->
                                                    </select>                
                                                    @error('genre_payment')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">保存する</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         {{-- 投稿モーダル --}}
                        




                        <div class="card-body" style="overflow-y: auto; max-height: 92vh;">
                            <ul class="list-group">
                                @foreach ($restaurants as $restaurant)
                                <li class="list-group-item" style="background-color: #f8f9fa; border: 1px solid #ced4da; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <img src="{{ Storage::url($restaurant->image_path) }}" class="img-thumbnail" alt="restaurant photo" style="width: 100%; height: auto; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h5>{{ $restaurant->name }}</h5>
                                            <p>{{ $restaurant->address }}</p>
                                            <p>{{ $restaurant->genre_place }}</p>
                                            <!-- モーダルトリガーボタン -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $restaurant->id }}">
                                                投稿詳細を表示
                                            </button>



                                            {{-- likeボタンの作成 --}}
                                            <div class="btn-container" id="target{{ $restaurant->id }}">
                                                @if ($restaurant->isLike)
                                                    {{-- <form action="{{ route('like.destroy', $restaurant->id) }}" method="POST" class="likebutton">
                                                        @csrf
                                                        @method('DELETE') --}}
                                                        <button id="unlike" onclick="unlike({{ $restaurant->id }})"><i class="ri-heart-fill"></i></button>
                                                    {{-- </form> --}}
                                                @else
                                                    {{-- <form action="{{ route('like.store', $restaurant->id) }}" method="POST" class="likebutton"> --}}
                                                        {{-- @csrf --}}
                                                        <button id="like" onclick="like({{ $restaurant->id }})"><i class="ri-heart-line"></i></button>
                                                    {{-- </form> --}}
                                                @endif
                                            </div>

                                            <!-- 詳細モーダル始 -->
                                            <div class="modal fade" id="exampleModal_{{ $restaurant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $restaurant->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center mb-4">
                                                                        <img src="{{ Storage::url($restaurant->image_path) }}" class="img-fluid rounded shadow-lg" alt="restaurant photo">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p><strong>ユーザー名:</strong> {{ $restaurant->user->name }}</p>
                                                                        <p><strong>店舗名:</strong> {{ $restaurant->name }}</p>
                                                                        <p><strong>住所:</strong> {{ $restaurant->address }}</p>
                                                                        <p><strong>エリア:</strong> {{ $restaurant->genre_place }}</p>
                                                                        <p><strong>ジャンル:</strong> {{ $restaurant->genre_variety }}</p>
                                                                        <p><strong>食事制限:</strong> {{ $restaurant->genre_religion }}</p>
                                                                        <p><strong>支払方法:</strong> {{ $restaurant->genre_payment }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="text-start">
                                                                            <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="btn btn-primary">編集フォーム</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="text-end">
                                                                            <form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger">削除</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- モーダル終 -->

                                        </div>
                                    </div>
                                </li>
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


<script>
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


function like(id) {
    

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

function unlike(id) {

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
