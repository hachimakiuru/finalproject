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
        <th scope="col">詳細</th>
        <th scope="col">変更</th>
        <th scope="col">削除</th>
      </tr>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->room_number }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->role->name }}</td>
        <td><button type="button" class="btn btn-secondary">Details</button></td>
        <td><button type="button" class="btn btn-secondary">Update</button></td>
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
    @endforeach
  </table>


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

    //      var deleteButtons = document.querySelectorAll('.deleteUser');
    //  deleteButtons.forEach(function(button) {
    //     button.addEventListener('click', function(){
    //         alert('aaaa');
    //     });
    //  });

    //  document.getElementById('deleteUser').addEventListener('click', function(){
    //   alert('aaaa');
    //  });
  </script>
</body>
@endsection
