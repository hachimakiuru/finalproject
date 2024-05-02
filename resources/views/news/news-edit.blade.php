
@extends('layouts.layout')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
     <div class="col-md-15">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="col-md-18">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>編集フォーム</h4>
                                {{-- <button type="button" class="btn-close" onclick="location.href='{{ url()->previous() }}" aria-label="閉じる"></button> --}}
                                {{-- <button type="button" class="btn-close" onclick="location.href='{{ route('news.event') }}" aria-label="閉じる"></button> --}}
                                <button type="button" class="btn-close" onclick="location.href='{{ url()->previous() }}'" aria-label="閉じる"></button>
                            </div>
                            <div class="card-body"> 
                                <!-- 投稿フォーム -->
                            <form action="{{ route('news.update',$newsTimeLine->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="username" class="form-label">ユーザー名</label> 
                                        {{-- <input type="text" id="username" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}">  --}}
                                         <p>{{Auth::user()->name }}</p>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">タイトル</label>
                                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $newsTimeLine->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="start" class="form-label">開催日</label>
                                        <input type="date" id="start" name="start" class="form-control @error('start') is-invalid @enderror" value="{{ \Carbon\Carbon::parse($newsTimeLine->start)->format('Y-m-d') }}">
                                        @error('start')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="place" class="form-label">場所</label>
                                        <input type="text" id="place" name="place" class="form-control @error('place') is-invalid @enderror" value="{{ $newsTimeLine->place }}">
                                        @error('place')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">内容</label>
                                        <input type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ $newsTimeLine->content }}">
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">金額</label>
                                        <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $newsTimeLine->price }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="others" class="form-label">その他</label>
                                        <input type="text" id="others" name="others" class="form-control @error('others') is-invalid @enderror" value="{{ $newsTimeLine->others }}">
                                        @error('others')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">写真</label>
                                        <div class="input-group">
                                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ $newsTimeLine->image }}" aria-describedby="inputGroupFileAddon">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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