@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>ローカルイベント</h2>
            @if(count($posts) > 0)
                <ul class="list-group">
                    @foreach($posts as $post)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>投稿日: {{ $post->created_at->format('Y-m-d') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>{{ $post->date }} - {{ $post->title }}</h4>
                                </div>
                                <div class="col-md-3">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                                    @else
                                        <p>No Image</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No posts found</p>
            @endif
        </div>
    </div>
</div>


@endsection