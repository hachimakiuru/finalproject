

@extends('layouts.layout')

@section('content')

@include('parts.success-message')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-15">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                           <a href="{{ route('news.others') }}">←</a> <h4>日本文化</h4><a href="{{ route('news.hotel-info') }}">→</a>
                           @if (Auth::user()->role_id == 1)  
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">投稿</button>
                           @endif
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
                                            <div class="news-option">
                                                <label for="genre" class="news-option-form">ジャンル</label>
                                                <select name="genre_id" id="genre">
                                                    <option value="3">日本文化</option>
                                                    <option value="2">ホテルからのお知らせ</option>
                                                    <option value="4">その他おすすめ情報</option>
                                                    <option value="1">ローカルイベント</option>
                                                </select>
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
                                                <label for="start" class="col-sm-2 col-form-label">開催日</label>
                                                <div class="col-sm-10">
                                                    <input type="date" id="start" name="start" class="form-control @error('start') is-invalid @enderror" value="">
                                                    @error('start')
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
                                                    <input type="text" id="price" name="price"  placeholder="~yen ＊rough price" class="form-control @error('price') is-invalid @enderror" value="">
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
                                            <img src="{{ asset('storage/img/' . $newsTimeLine->image)}}" class="img-thumbnail" alt="restaurant photo" style="width: 50%; height: auto; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h3 class="news-title1">{{ \Carbon\Carbon::parse($newsTimeLine->start)->format('Y-m-d') }}</h3>
                                            <p class="news-title2">{{ $newsTimeLine->title }}</p>
                                            <p class="news-title2">{{ $newsTimeLine->place }}</p>
                                            <!-- モーダルトリガーボタン -->
                                            <button type="button" class="btn btn-border-shadow btn-border-shadow--color2 custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $newsTimeLine->id }}">
                                                Details & Reservation Form >
                                            </button>


<!-- 詳細&予約モーダル始 -->
<div class="modal fade" id="exampleModal_{{ $newsTimeLine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $newsTimeLine->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
            {{-- モーダルbody --}}
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- 詳細情報 -->
                        <div class="col-md-7">
                            <div class="detail p-4">
                                <div class="detail">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/img/' . $newsTimeLine->image) }}" class="img-fluid rounded shadow-lg mb-4" alt="restaurant photo" style="max-width: 100%;">
                                    </div>
                                    <p><strong>ユーザー名:</strong> {{ $newsTimeLine->user->name }}</p>
                                    <p><strong>開催日:</strong> {{ \Carbon\Carbon::parse($newsTimeLine->start)->format('Y-m-d') }}</p>
                                    <p><strong>場所:</strong> {{ $newsTimeLine->content }}</p>
                                    <p><strong>内容:</strong> {{ $newsTimeLine->place }}</p>
                                    <p><strong>金額:</strong> {{ $newsTimeLine->price }}~yen ＊rough price</p>
                                    <p><strong>その他:</strong> {{ $newsTimeLine->others }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- 予約フォーム -->
                        <div class="form bg-light p-5 rounded ms-md-4" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 400px;">
                            <h2 class="mb-4 text-center" style="font-size: 1.5rem; color: #333;">予約フォーム</h2>
                            <div class="booking">
                                <form action="{{ route('news-booking.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="news_time_line_id" value="{{ $newsTimeLine->id }}">

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
                <!-- フッターの内容 -->
                @if (Auth::user()->role_id == 1 || Auth::id() == $newsTimeLine->user_id)  
                <div class="container-fluid">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-auto">
                            <form action="{{ route('news.news-edit' , $newsTimeLine -> id) }}">
                                <button type="submit" class="btn btn-primary" data-bs-target="#editModal_{{ $newsTimeLine->id }}">
                                    <i class="ri-edit-2-line"></i>
                                </button>
                            </form>
                        </div>                                                        
                        <div class="col-md-auto">
                            <div class="btn-group" role="group" aria-label="アクション">
                                <form action="{{ route('news.destroy', $newsTimeLine -> id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!--詳細&予約モーダル終 -->





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
