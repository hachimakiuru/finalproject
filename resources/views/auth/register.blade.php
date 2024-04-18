@extends('layouts.layout')
@section('content')

@include('parts.success-message')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6">
          <form class="form mt-5" action="{{ route('register') }}" method="post">
            @csrf
              <h3 class="text-center text-dark">アカウント登録</h3>
              <div class="form-group">
                <label for="name" class="text-dark">名前:</label><br>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mt-3">
                  <label for="email" class="text-dark">メールドレス:</label><br>
                  <input type="email" name="email" id="email" placeholder="namiki@test.com" class="form-control">
                  @error('email')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <label for="room_number" class="text-dark">部屋番号:</label><br>
                <input type="number" name="room_number" id="room_number" min="100" class="form-control">
                @error('room_number')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              {{-- 従業員ID一旦コメントアウト --}}
              {{-- <div class="form-group mt-3">
                <label for="employ" class="text-dark">従業員ID:</label><br>
                <input type="number" name="employ" id="employ" min="1" placeholder="" class="form-control">
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
              </div> --}}
              {{-- ---------------------------- --}}
              <div class="form-group mt-3">
                  <label for="password" class="text-dark">パスワード:</label><br>
                  <input type="password" name="password" id="password" class="form-control">
                  @error('password')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mt-3">
                  <label for="password_confirmation" class="text-dark">パスワード確認:</label><br>
                  <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                  @error('password_confirmation')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="remember-me" class="text-dark"></label><br>
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="送信">
              </div>
              <div class="text-right mt-3">
                  <a href="/login" class="text-dark">ログインはこちら</a>
              </div>
          </form>
      </div>
  </div>

@endsection