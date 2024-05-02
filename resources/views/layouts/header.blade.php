<header class="header">
  <div class="inner">
      @auth
      <ul class="header-nav">
        <li><a class="{{ Route::is('welcome') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('welcome') }}">Home</a></li>
        <li><a class="{{ Route::is('chatify') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('chatify') }}">Chat</a></li>
        <li><a class="{{ Route::is('restaurants.index') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('restaurants.index') }}">Food & Beverage</a></li>
        <li><a class="{{ Route::is('activity.dashboard') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('activity.dashboard') }}">Activity</a></li>
        <li><a class="{{ Route::is('calendar.view') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('calendar.view') }}">Calendar</a></li>
        <li><a class="{{ Route::is('experience.index') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('experience.index') }}">Memory</a></li>
        @auth
        @if(auth()->user()->role_id === 1)
        <li><a class="{{ Route::is('admin.dashboard') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('admin.dashboard') }}">Admin Page</a></li>
        <li><a class="{{ Route::is('rbooking.index') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('rbooking.index') }}">F&B Request List</a></li>
        <li><a class="{{ Route::is('newsBookings.index') ? 'text-dark bg-white rounded py-1 px-2' : ' '}}" href="{{ route('newsBookings.index') }}">Activity Request List</a></li>
        @endif
        @endauth
      </ul>
      <ul class="header-right">
        <li><a href="#">{{ Auth::user()->name }}</a></li>
        <li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </div>
    @endauth
    
  </div>
</header>