@extends('layouts.layout')
@section('content')

@include('parts.success-message')
<body class="">
  <h1>Activities Booking Request</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Event</th>
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
      @foreach ($news_posts as $news_post)
      <tr>
        <th scope="row">{{ $news_post->id }}</th>
        <td>{{ $news_post->day }}</td>
        <td>{{ $news_post->user->name }}</td>
        <td>{{ $news_post->user->room_number }}</td>
        <td>{{ $news_post->number_guests }}</td>
        <td>{{ $news_post->day }}</td>
        <td>{{ $news_post->time1 }}</td>
        <td>{{ $news_post->time2 }}</td>
        <td>{{ $news_post->memo }}</td>
        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $news_post->id }} ">Edit</button></td>
        <td>
          <form method="POST" action="{{ route('newsBookings.destroy', $news_post->id) }}">
          <form method="POST" action="">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger deleteNewspost">Delete</button>
        </form>
        </td>
      </tr>
    </tbody>

 <!-- Modal of edit-->
 <div class="modal fade" id="exampleModal{{ $news_post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">希望情報の変更</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-sm-8 col-md-10">
                  <form class="form mt-5" action="" method="post">
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

    var deleteButtons = document.querySelectorAll('.deleteNewspost');
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
