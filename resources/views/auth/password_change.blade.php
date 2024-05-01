<!-- password_change.blade.php -->
<h1>パスワード変更画面</h1>
@include('parts.success-message')
<form method="POST" action="{{ route('password.change') }}">
  @csrf
  <input type="text" name="current_password" placeholder="Current Password">
  <input type="password" name="new_password" placeholder="New Password">
  <input type="password" name="new_password_confirmation" placeholder="Confirm New Password">
  <button type="submit">Change Password</button>
</form>
