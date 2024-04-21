
@extends('layouts.layout')
@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6">
          <form class="form mt-5" action="{{ route('register') }}" method="post">
            @csrf
              <h3 class="text-center text-dark">アカウン編集</h3>
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


              <p class="mt-3">ユーザータイプ:</p>
              <div class="form-group form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">宿泊者</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">従業員</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                <label class="form-check-label" for="inlineRadio3">管理者</label>
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