@extends('layouts.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/welcome-blade.css')  }}" >
@endpush

@include('parts.success-message')
<div class="welcome__container">
  <div>
    <a class="welcome__box" href="#">
      <div class="welcome__box-img">
        <img src="{{ asset('/img/welcome-food.png') }}" alt="">
        <span class="welcome__box-title">グルメ</span>
      </div>
      <div class="welcome__box-text">
        <p class="welcome__text">Go and check our posts</p>
      </div>
    </a>
  </div>
  <div>
    <a class="welcome__box" href="#">
      <div class="welcome__box-img">
        <img src="{{ asset('/img/welcome-food.png') }}" alt="">
        <span class="welcome__box-title">グルメ</span>
      </div>
      <div class="welcome__box-text">
        <p class="welcome__text">Go and check our posts</p>
      </div>
    </a>
  </div>
</div>

@endsection