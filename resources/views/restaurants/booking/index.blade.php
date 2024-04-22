@extends('layouts.layout')
@section('content')

@push('css')
  <link rel="stylesheet" href="{{ asset('/css/restaurant/booking-index.css')  }}" >
@endpush

@include('parts.success-message')
<body class="rbooking__body">
  <h1>Restaurant Booking Request</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Guest Name</th>
        <th scope="col">#Room</th>
        <th scope="col">Number</th>
        <th scope="col">Request Date</th>
        <th scope="col">1st option</th>
        <th scope="col">2st option</th>
        <th scope="col">Memo</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    <tbody>
      @foreach ($restaurant_posts as $restaurant_post)
      <tr>
        <th scope="row">{{ $restaurant_post->id }}</th>
        <td>{{ $restaurant_post->user->name }}</td>
        <td>{{ $restaurant_post->user->room_number }}</td>
        <td>{{ $restaurant_post->number_guests }}</td>
        <td>{{ $restaurant_post->day }}</td>
        <td>{{ $restaurant_post->time1 }}</td>
        <td>{{ $restaurant_post->time2 }}</td>
        <td>{{ $restaurant_post->memo }}</td>
        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $restaurant_post->id }} ">Edit</button></td>
        <td>
          <form method="POST" action="{{ route('rbooking.destroy', $restaurant_post->id) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger deleteUser">Delete</button>
        </form>
        </td>
      </tr>
    </tbody>

 <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $restaurant_post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">アカウント情報の変更</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-sm-8 col-md-10">
                  <form class="form mt-5" action="{{ route('rbooking.update', $restaurant_post->id) }}" method="post">
                    @csrf 
                    @method('put')
                      <div class="form-group">
                          <label for="remember-me" class="text-dark"></label><br>
                          <input type="submit" name="submit" class="btn btn-dark btn-md" value="送信">
                      </div>
                  </form>
              </div>
          </div>

      </div>
    </div>
  </div>
</div>
  @endforeach

  <script>

    var deleteButtons = document.querySelectorAll('.deleteUser');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          // alert('test');
            // アラートを表示
            var confirmation = confirm('Are you sure that you want to delete？?');
            // OKが押された場合は何もしない（デフォルトの動作を続行）
            if (!confirmation) {
                event.preventDefault(); // デフォルトの動作をキャンセル
            }
        });
    });
      </script>
</body>
@endsection
