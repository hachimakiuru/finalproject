@extends('layouts.layout')
@section('content')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/auth/login.css')  }}" >
@endpush

@include('parts.success-message')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6">
          <form class="form mt-5" action="{{ route('login') }}" method="post">
            @csrf
              <h3 class="text-center text-dark">ログイン</h3>
              <div class="form-group mt-3">
                  <label for="email" class="text-dark">メールドレス:</label><br>
                  <input type="email" name="email" id="email" placeholder="namiki@test.com" class="form-control">
                  @error('email')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <label for="room_number" class="text-dark">部屋番号:</label><br>
                {{-- <p class="form-control pt-5">{{  }}</p> --}}
                <input type="number" name="room_number" id="room_number" min="100" class="form-control">
                @error('room_number')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mt-3">
                  <label for="password" class="text-dark">パスワード:</label><br>
                  <input type="password" name="password" id="password" class="form-control">
                  @error('password')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="remember-me" class="text-dark"></label><br>
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="送信">
              </div>
              <div class="text-right mt-3">
                  <a href="/register" class="text-dark">アカウント登録はこちら</a>
              </div>
          </form>
      </div>
  </div>

@endsection