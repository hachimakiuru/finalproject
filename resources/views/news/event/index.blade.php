


@extends('layouts.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/news-index-blade.css')  }}" >
@endpush

<body>
    <h1>ローカルイベント</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        イベントの情報追加
    </button>
    
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">タイトル</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="title" name="title"  style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">内容</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="content" name="content"  style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="day" class="form-label">日付</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="day" name="day"  style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">金額</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="number" id="price" name="price"  style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="place" class="form-label">場所</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="place" name="place"  style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">写真</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="file" id="image" name="image" style="width: 100%;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="others" class="form-label">コメント</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="others" name="others"  style="width: 100%;">
                        </div>
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
                    <!-- 他のフォーム入力要素 -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    
    <table>
        <thead>
            <tr>
                <th>投稿日</th>
                <th>日付とタイトル</th>
                <th>写真</th>
            </tr>
        </thead>
        <tbody class="box1">
            @foreach($newsTimeLines as $newsTimeLine)
            <tr>
                <td class="no1">{{ $newsTimeLine->created_at }}</td>
                <td class="no2">{{ $newsTimeLine->day }} - {{ $newsTimeLine->title }}</td>
                <td class="no3"><img src="{{ asset('storage/img/' . $newsTimeLine->image) }}" alt="" width="100" height="100"></td>
                <td class="no4">
                    <a href="{{ route('news.show', $newsTimeLine->id) }}">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>

@endsection