@extends('layouts.layout')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/restaurant-dashboard.css')  }}" >
@endpush

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
                                                    {{-- <input type="text" id="username" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="#"> --}}
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
                                {{-- <div>{{ dd($restaurant) }}</div> --}}
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
@endsection


