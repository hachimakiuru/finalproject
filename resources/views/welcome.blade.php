<h1>初期のWELCOMEページの中身消してます。ヘッダー継承していません。</h1>

@auth
<div>
  <a href="/login">ログイン</a>
</div>
@endauth

@guest
<div>
  <a href="/register">登録</a>
</div>
@endguest