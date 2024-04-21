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
                    <div class="col-md-18">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>投稿フォーム</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="card-body">
                                <!-- 投稿フォーム -->
                                <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label for="username" class="form-label">ユーザー名</label>
                                        <input type="text" id="username" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}">
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="storename" class="form-label">店舗名</label>
                                        <input type="text" id="storename" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">住所</label>
                                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">写真</label>
                                        <div class="input-group">
                                            <input type="file" id="image" name="image_path" class="form-control @error('image_path') is-invalid @enderror" value="{{ old('image_path') }}" aria-describedby="inputGroupFileAddon">
                                            @error('image_path')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>                        
                                    </div>
                                    {{-- タグ機能を水平方向に横一列にする --}}
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3 d-flex flex-column">
                                                <label for="genre_place" class="col-form-label mb-2">場所</label>
                                                <div>
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
                                                    </select>
                                                    @error('genre_place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3 d-flex flex-column">
                                                <label for="genre_variety" class="col-form-label mb-2">種類</label>
                                                <div>
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
                                                    </select>
                                                    @error('genre_variety')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3 d-flex flex-column">
                                                <label for="genre_religion" class="col-form-label mb-2">食事制限</label>
                                                <div>
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
                                                    </select>
                                                    @error('genre_religion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3 d-flex flex-column">
                                                <label for="genre_payment" class="col-form-label mb-2">支払方法</label>
                                                <div>
                                                    <select class="form-select @error('genre_payment') is-invalid @enderror" id="genre_payment" name="genre_payment">
                                                        <option selected disabled>選択してください</option>
                                                        <option value="なんでもok">なんでもok</option>
                                                        <option value="現金のみ">現金のみ</option>
                                                        <option value="クレジットカード">クレジットカード不可</option>
                                                        <option value="電子マネー">電子マネー不可</option>
                                                    </select>                
                                                    </select>
                                                    @error('genre_payment')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">保存する</button>
                                    </div>
                                </form>
                                <!-- 投稿フォーム -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
