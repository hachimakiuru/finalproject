@extends('layouts.layout')
@section('content')
@push('css')
  <link rel="stylesheet" href="{{ asset('/css/auth/login.css')  }}" >
@endpush


{{-- <h2>Welcome to our hotel !!</h2>
<form class="form" method="POST" action="{{ route('password.change') }}">
  @csrf
  <input class="form-control" type="text" name="current_password" placeholder="Current Password">
  <input class="form-control" type="password" name="new_password" placeholder="New Password">
  <input class="form-control" type="password" name="new_password_confirmation" placeholder="Confirm New Password">
  <button type="submit">Change Password</button>
</form> --}}

@include('parts.success-message')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6">
          <form class="form mt-5" action="{{ route('password.change') }}" method="POST">
            @csrf
              <h3 class="text-center text-dark">Welcome to our hotel !</h3>
              <h5 class="text-center text-danger">Please change to your own pasword</h5>
              <div class="form-group mt-3">
                  {{-- <label for="current_password" class="text-dark">Current Password:</label><br> --}}
                  <input type="text" name="current_password" class="form-control" placeholder="Current Password">
                  {{-- @error('password')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror --}}
              </div>
              <div class="form-group mt-3">
                {{-- <label for="new_password" class="text-dark">New Password</label><br> --}}
                {{-- <p class="form-control pt-5">{{  }}</p> --}}
                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                @error('room_number')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mt-3">
                  {{-- <label for="new_password_confirmation" class="text-dark">Confirm New Password:</label><br> --}}
                  <input type="password" name="new_password_confirmation"  class="form-control" placeholder="Confirm New Password">
                  @error('password')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="remember-me" class="text-dark"></label><br>
                  <input type="submit"  class="btn btn-dark btn-md" value="Change Password">
              </div>
          </form>
      
      </div>
  </div>

@endsection