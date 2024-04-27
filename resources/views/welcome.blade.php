@extends('layouts.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/welcome-blade.css')  }}" >
@endpush

@include('parts.success-message')

<div class="body">
  <div class="welcome_container">
    <div class="h1-text">
      <h1>What's on your mind?</h1>
    </div>
    <div class="welcome_box box1"> 
      <a href="{{ route('activity.dashboard') }}"> 
        <div class="welcome_box-img">
          <img src="{{ asset('/img/activity.jpg') }}" alt="">
          <span class="welcome_box-title">Activity</span>
        </div>
        <div class="welcome_box-text">
          <p class="welcome_text">↑ Go and check our posts ↑</p>
        </div>
      </a>
    </div> 

    <div class="welcome_box box2"> 
      <a href="{{ route('restaurants.index') }}"> 
        <div class="welcome_box-img">
          <img src="{{ asset('/img/gourmet.jpg') }}" alt="">
          <span class="welcome_box-title">Gourmet</span>
        </div>
        <div class="welcome_box-text">
          <p class="welcome_text">↑ Go and check our posts ↑</p>
        </div>
      </a>
    </div> 
  </div>
</div>

@endsection