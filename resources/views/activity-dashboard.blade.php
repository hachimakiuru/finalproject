@extends('layouts.layout')
@section('content')
    

<body>

    <div class="container">
        <!-- 左半分 -->
        <div class="left">
            <!-- カレンダー -->
            <div class="top-box">
                カレンダー機能
            </div>
            <!-- ニュース -->
            <div class="bottom-box">
                @include('news-dashboard')
            </div>
        </div>
        <!-- アクティビティ -->
        <div class="right">
            アクティビティ機能
        </div>
    </div>
    
</body>

@endsection