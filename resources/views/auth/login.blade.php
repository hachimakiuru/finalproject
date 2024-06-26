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
              <h3 class="text-center text-dark">Login</h3>
              <div class="form-group mt-3">
                  <label for="email" class="text-dark">Email:</label><br>
                  <input type="email" name="email" id="email"  class="form-control">
                  @error('email')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <label for="room_number" class="text-dark">Room Number or Employee ID:</label><br>
                {{-- <p class="form-control pt-5">{{  }}</p> --}}
                <input type="number" name="room_number" id="room_number" class="form-control">
                @error('room_number')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mt-3">
                  <label for="password" class="text-dark">Password:</label><br>
                  <input type="password" name="password" id="password" class="form-control">
                  @error('password')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="remember-me" class="text-dark"></label><br>
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="Login">
              </div>
          </form>
          <button class="btn-passwordChange mt-3"><a href="{{ route('password.change.form') }}">Click to change your password</a></button>
      </div>
  </div>

@endsection