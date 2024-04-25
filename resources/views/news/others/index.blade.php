
@extends('layouts.layout')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-15">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>その他おすすめ情報</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">投稿</button>
                        </div>

                        {{-- 投稿モーダル --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">新規投稿</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <label for="title" class="col-sm-2 col-form-label">タイトル</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="">
                                                    @error('title')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="day" class="col-sm-2 col-form-label">開催日</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="day" name="day" class="form-control @error('day') is-invalid @enderror" value="">
                                                    @error('day')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="place" class="col-sm-2 col-form-label">場所</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="place" name="place" class="form-control @error('place') is-invalid @enderror" value="">
                                                    @error('place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="place" class="col-sm-2 col-form-label">内容</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="content" name="content" class="form-control @error('place') is-invalid @enderror" value="">
                                                    @error('place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="price" class="col-sm-2 col-form-label">金額</label>
                                                <div class="col-sm-10">
                                                    <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="">
                                                    @error('price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="others" class="col-sm-2 col-form-label">その他</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="others" name="others" class="form-control @error('others') is-invalid @enderror" value="">
                                                    @error('others')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="image" class="col-sm-2 col-form-label">写真</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="image" class="form-label">写真</label>
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="file" id="image" name="image" style="width: 100%;">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="mb-3">
                                                <label for="genre" class="form-label">ジャンル</label>
                                                <select name="genre_id" id="genre">
                                                    <option value="3">日本文化</option>
                                                    <option value="2">ホテルからのお知らせ</option>
                                                    <option value="4">その他おすすめ情報</option>
                                                    <option value="1">ローカルイベント</option>
                                                </select>
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
                                @foreach($newsTimeLines as $newsTimeLine)
                                <li class="list-group-item" style="background-color: #f8f9fa; border: 1px solid #ced4da; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/img/' . $newsTimeLine->image)}}" class="img-thumbnail" alt="restaurant photo" style="width: 100%; height: auto; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h5>{{ $newsTimeLine->day }} - {{ $newsTimeLine->title }}</h5>
                                            <p>{{ $newsTimeLine->place }}</p>
                                            <!-- モーダルトリガーボタン -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $newsTimeLine->id }}">
                                                詳細&予約フォーム
                                            </button>


<!-- 詳細モーダル始 -->
<!-- 詳細モーダル始 -->
<div class="modal fade" id="exampleModal_{{ $newsTimeLine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $newsTimeLine->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <!-- ページ1の内容 -->
                    <div class="page" id="page1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <img src="{{asset('storage/img/' . $newsTimeLine->image)}}" class="img-fluid rounded shadow-lg" alt="restaurant photo">
                                </div>
                                <p><strong>ユーザー名:</strong> {{ $newsTimeLine->user->name }}</p>
                                <p><strong>開催日:</strong> {{ $newsTimeLine->day }}</p>
                                <p><strong>場所:</strong>{{ $newsTimeLine->content }}</p>
                                <p><strong>内容:</strong> {{ $newsTimeLine->place}}</p>
                                <p><strong>金額:</strong> {{ $newsTimeLine->price  }}</p>
                                <p><strong>その他:</strong> {{ $newsTimeLine->others }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- 前のページに移動するボタン -->
                                <button type="button" class="btn btn-light" id="prevBtn">
                                    <i class="fas fa-chevron-left"></i> 詳細
                                </button>
                                <!-- ページ番号 -->
                                <div id="pageNumber" class="h5 text-center">1 / 2</div>
                                <!-- 次のページに移動するボタン -->
                                <button type="button" class="btn btn-light" id="nextBtn">
                                    予約フォーム <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 削除ボタンと編集ボタン -->
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- 編集ボタン -->
                                <a href="{{ route('news.news-edit' , $newsTimeLine -> id) }}" class="btn btn-primary">編集</a>
                                <!-- 削除ボタン -->
                                <form action="{{ route('news.destroy', $newsTimeLine -> id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
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

<script>
    // 現在のページと総ページ数を保持する変数
    let currentPage = 1;
    const totalPages = 2; // 総ページ数は適宜変更してください

    // ページ番号を更新する関数
    function updatePageNumber() {
        document.getElementById('pageNumber').textContent = currentPage + ' / ' + totalPages;
    }

    // 前のページに移動する関数
    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            updatePageNumber();
            showPage(currentPage);
        }
    }

    // 次のページに移動する関数
    function nextPage() {
        if (currentPage < totalPages) {
            currentPage++;
            updatePageNumber();
            showPage(currentPage);
        }
    }

    // ページを表示する関数
    function showPage(page) {
        // 全てのページを非表示にする
        document.querySelectorAll('.page').forEach(function(element) {
            element.style.display = 'none';
        });
        // 指定されたページを表示する
        document.getElementById('page' + page).style.display = 'block';
    }

    // 初期表示として最初のページを表示
    showPage(currentPage);
    
    // ボタンのクリックイベントリスナーを追加
    document.getElementById('prevBtn').addEventListener('click', function() {
        prevPage();
    });
    document.getElementById('nextBtn').addEventListener('click', function() {
        nextPage();
    });
</script>



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
