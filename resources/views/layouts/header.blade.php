<header class="header">
  <div class="inner">
    @guest
    <div class="header-wrapper">
      <ul class="header-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Activity</a></li>
        <li><a href="#">Chat Message</a></li>
      </ul>
      <ul class="header-right">
        <li><a href="{{ route('login') }}">ログイン</a></li>
        <li><a href="{{ route('register') }}">登録</a></li>
      </ul>
      @endguest

      @auth
      <ul class="header-nav">
        <li><a href="{{ route('welcome') }}">Home</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Activity</a></li>
        <li><a href="#">Chat Message</a></li>
        @auth
        @if(auth()->user()->role_id === 1)
        <li><a href="{{ route('admin.dashboard') }}">Admin Page</a></li>
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