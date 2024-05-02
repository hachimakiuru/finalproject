<form method="POST" action="{{ route('password.update') }}">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">
  <input type="email" name="email" value="{{ $email }}">
  <input type="password" name="password" placeholder="New Password">
  <input type="password" name="password_confirmation" placeholder="Confirm New Password">
  <button type="submit">Reset Password</button>
</form>
