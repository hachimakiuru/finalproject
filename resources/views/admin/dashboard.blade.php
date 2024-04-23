@extends('layouts.layout')
@section('content')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/admin-dashboard.css')  }}" >
@endpush

@include('parts.success-message')
<body>
  <h1>ADMIN PAGE</h1>
  <button type="submit" class="btn-create-user">
    <a href="{{ route('register') }}">新規アカウントを追加</a>
  </button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">RoomNo.</th>
        <th scope="col">Created At</th>
        <th scope="col">Authority</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->room_number }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->role ? $user->role->name : 'No Role' }}</td>
        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $user->id }} ">Edit</button></td>
        <td>
          <form method="POST" action="{{ route('user.destroy', $user->id) }}">
            @csrf
            @method('delete')
            {{-- <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
            <a href="{{ route('ideas.show', $idea->id) }}">View</a> --}}
            <button type="submit" class="btn btn-danger deleteUser">Delete</button>
        </form>
        </td>
      </tr>
    </tbody>

    <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form class="form mt-5" action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf 
                    @method('post')
                      <div class="form-group">
                        <label for="name" class="text-dark">名前:</label><br>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        @error('name')
                        <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group mt-3">
                          <label for="email" class="text-dark">メールドレス:</label><br>
                          <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                          @error('email')
                          <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group mt-3">
                        <label for="room_number" class="text-dark">部屋番号:</label><br>
                        <input type="number" name="room_number" id="room_number" min="100" class="form-control" value="{{ $user->room_number }}">
                        @error('room_number')
                        <span class="d-block fs-6 text-danger mt-10">{{ $message }}</span>
                        @enderror
                      </div>
                      <p class="mt-3">ユーザー権限:</p>
                      @foreach ($roles as $role)
                      <input class="form-check-input" type="radio" name="role_id" id="role_id_{{ $role->id }}" value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'checked' : '' }}>
                      <label class="form-check-label" for="role_id_{{ $role->id }}">{{ $role->name }}</label>
                      @endforeach
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
  </table>





{{-- ------------------------- --}}

  <script>

var deleteButtons = document.querySelectorAll('.deleteUser');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        // アラートを表示
        var confirmation = confirm('本当にアカウントを削除しますか？?');
        // OKが押された場合は何もしない（デフォルトの動作を続行）
        if (!confirmation) {
            event.preventDefault(); // デフォルトの動作をキャンセル
        }
    });
});
  </script>
</body>
@endsection
