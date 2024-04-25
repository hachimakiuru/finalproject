<header class="header">
  <div class="inner">
      @auth
      <ul class="header-nav">
        <li><a href="{{ route('welcome') }}">ホーム</a></li>
        <li><a href="{{ route('restaurants.index') }}">グルメ</a></li>
        <li><a href="{{ route('activity.dashboard') }}">アクティビティ</a></li>
        <li><a href="#">チャット</a></li>
        @auth
        @if(auth()->user()->role_id === 1)
        <li><a href="{{ route('admin.dashboard') }}">管理者画面</a></li>
        <li><a href="{{ route('rbooking.index') }}">レストラン予約一覧</a></li>
        <li><a href="{{ route('newsBookings.index') }}">アクティビティ予約一覧</a></li>
        @endif
        @endauth
      </ul>
      <ul class="header-right">
        <li><a href="#">{{ Auth::user()->name }}</a></li>
        <li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">ログアウト</button>
          </form>
        </li>
      </ul>
    </div>
    @endauth
    
  </div>
</header>