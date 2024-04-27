@extends('layouts.layout')
@section('content')

@push('css')
  <link rel="stylesheet" href="{{ asset('/css/auth/register')  }}" >
@endpush

<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6">
          <form class="form mt-5" action="{{ route('register') }}" method="post">
            @csrf
              <h3 class="text-center text-dark">New Account</h3>
              <div class="form-group">
                <label for="name" class="text-dark">Name:</label><br>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mt-3">
                  <label for="email" class="text-dark">Email:</label><br>
                  <input type="email" name="email" id="email" class="form-control">
                  @error('email')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <label for="room_number" class="text-dark">Room Number: <span class="required">Only Guest is required</span></label><br>
                <input type="number" name="room_number" id="room_number" min="100" class="form-control">
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
              <div class="form-group mt-3">
                  <label for="password_confirmation" class="text-dark">Confirmation:</label><br>
                  <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                  @error('password_confirmation')
                  <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                  @enderror
              </div>

              <p class="mt-3">User Authority:</p>
              
              <label class="form-check-label" for="">Role:</label>
              @foreach ($roles as $role)
              <input class="form-check-input" type="radio" name="role_id" id="role_id" value="{{ $role->id }}">
              <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label>

              {{-- <div class="form-check form-check-inline">
              </div> --}}
              @endforeach
              <div class="form-group">
                  <label for="remember-me" class="text-dark"></label><br>
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="Submit">
              </div>
              <div class="text-right mt-3">
                  <a href="/login" class="text-dark">Click to login</a>
              </div>
          </form>
      </div>
  </div>

@endsection