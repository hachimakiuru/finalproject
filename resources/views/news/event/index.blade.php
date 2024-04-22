@extends('layouts.layout')
@section('content')

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
                    <form action="{{ route('news.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="user_id" class="form-label">ユーザー名</label>
                            <input type="text" id="user_id" name="user_id" class="form-control">
                        </div> --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">タイトル</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">内容</label>
                            <input type="text" id="content" name="content" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="day" class="form-label">開催日</label>
                            <input type="date" id="day" name="day" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="place" class="form-label">住所</label>
                            <input type="text" id="place" name="place" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">金額</label>
                            <input type="number" id="price" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="others" class="form-label">その他</label>
                            <input type="text" id="others" name="others" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">写真</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="genre" id="btnradio1" value="genre_japan_activity" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnradio1">日本文化</label>
                            
                            <input type="radio" class="btn-check" name="genre" id="btnradio2" value="genre_local_event" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">ローカルイベント</label>
                            
                            <input type="radio" class="btn-check" name="genre" id="btnradio3" value="genre_hotel_info" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio3">ホテルからのお知らせ</label>
                
                            <input type="radio" class="btn-check" name="genre" id="btnradio4" value="genre_others" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio4">その他おすすめ情報</label>
                        </div>
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
        <tbody>
            @foreach ($news_time_lines as $news_time_line)
            <tr>
                <td>{{ $news_time_line->created_at }}</td> <!-- 投稿日 -->
                <td>
                    <div>{{ $news_time_line->day }}</div> <!-- 日付 -->
                    <div>{{ $news_time_line->title }}</div> <!-- タイトル -->
                </td>
                <td>
                    @if($news_time_line->image)
                        <img src="{{ asset('storage/' . $news_time_line->image) }}" alt="{{ $news_time_line->title }}"> <!-- 写真 -->
                    @endif
                </td>
                <td>
                    @switch($news_time_line->genre)
                        @case('genre_japan_activity')
                            @include('japan-culture.show', ['news_time_line' => $news_time_line])
                            @break
                        @case('genre_local_event')
                            @include('event.show', ['news_time_line' => $news_time_line])
                            @break
                        @case('genre_hotel_info')
                            @include('hotel-info.show', ['news_time_line' => $news_time_line])
                            @break
                        @case('genre_others')
                            @include('others.show', ['news_time_line' => $news_time_line])
                            @break
                    @endswitch
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>

@endsection