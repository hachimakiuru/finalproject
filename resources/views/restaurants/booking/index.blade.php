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
        <th scope="col">Restaurant</th>
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
        <td>{{ $restaurant_post->restaurantPost->name }}</td>
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

 <!-- Modal of edit-->
<div class="modal fade" id="exampleModal{{ $restaurant_post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">予約希望情報の変更</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-sm-8 col-md-10">
                  <form class="form mt-5" action="{{ route('rbooking.update', $restaurant_post->id) }}" method="post">
                    @csrf 
                    @method('PUT')
              <input type="hidden" name="restaurant_post_id" value="{{ $restaurant_post->id }}">
              <div class="form-group">
                  <label for="day">希望日:</label>
                  <input type="date" id="day" name="day" class="form-control" value="{{ $restaurant_post->day }}" required>
              </div>
              <div class="form-group">
                <label for="time1">第一希望時間:</label>
                <select id="time1" name="time1" class="form-control" required>
                    {{-- <option value="{{ old( $restaurant_post->time1) }} ">  {{  $restaurant_post->time1 }}</option> --}}
                    @if($restaurant_post->time1)
                    <option value="{{ old('time1', $restaurant_post->time1) }}">{{ $restaurant_post->time1 }}</option>
                    @endif
                    <optgroup label="朝 (6:00 - 11:59)">
                        @for ($hour = 6; $hour < 12; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="昼 (12:00 - 17:59)">
                        @for ($hour = 12; $hour < 18; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="夕方 (18:00 - 21:59)">
                        @for ($hour = 18; $hour < 22; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="夜 (22:00 - 23:59)">
                        @for ($hour = 22; $hour < 24; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                </select>
              </div>
              
              <div class="form-group">
                  <label for="time2">第二希望時間:</label>
                  <select id="time2" name="time2" class="form-control" required>
                    {{-- <option value="{{ old( $restaurant_post->time2) }} ">  {{  $restaurant_post->time2 }}</option> --}}
                    @if($restaurant_post->time2)
                    <option value="{{ old('time2', $restaurant_post->time2) }}">{{ $restaurant_post->time2 }}</option>
                    @endif
                    <optgroup label="朝 (6:00 - 11:59)">
                        @for ($hour = 6; $hour < 12; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="昼 (12:00 - 17:59)">
                        @for ($hour = 12; $hour < 18; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="夕方 (18:00 - 21:59)">
                        @for ($hour = 18; $hour < 22; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                    <optgroup label="夜 (22:00 - 23:59)">
                        @for ($hour = 22; $hour < 24; $hour++)
                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                        @endfor
                    </optgroup>
                </select>
              </div>
              
              <div class="form-group">
               <label for="number_guests">ゲスト人数:</label>
               <select id="number_guests" name="number_guests" class="form-control" required>
                {{-- <option value="{{ old($restaurant_post->number_guests) }}">{{ $restaurant_post->number_guests }}</option> --}}
                @if($restaurant_post->number_guests)
                <option value="{{ old('number_guests', $restaurant_post->number_guests) }}">{{ $restaurant_post->number_guests }}</option>
                @endif
                @for ($i = 1; $i <= 9; $i++)
                    <option value="{{ $i }}">{{ $i }}人</option>
                @endfor
                <option value="10以上">10人以上</option>
               </select>
           </div>

            <div class="form-group">
                <label for="memo">メモ:</label>
                <textarea id="memo" name="memo" class="form-control">{{ $restaurant_post->memo }}</textarea>
            </div>
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
