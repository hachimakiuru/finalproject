
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final Project</title>
    {{-- 独自cssの読み込み --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/experience-blade.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/header-blade.css') }}">

    {{-- Bootstrap5のCDN読み込み記述 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
@include('layouts.header')
<div>
    @yield('content')
</div>


<div class="d-flex justify-content-center p-3">
    <button class="btn custom-button" data-bs-toggle="modal" data-bs-target="#exampleModal">写真投稿はこちら!</button>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4 ">
    @foreach($experiences->reverse() as $experience)
    <div class="col">
        <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
            <div class='postimg'>
                <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <button class="backtotopthesite" style="text-decoration: none;" onclick="scrollToTop()">top
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ポンポンしちゃお〜〜</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data"> <!-- formタグの開始を修正 -->
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">画像を選択してください</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        {{-- <button type="submit" class="uploadbutton">＋</button> --}}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">title :</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="title" name="title"  style="width: 100%;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">address :</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="address" name="adress"  style="width: 100%;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">comment :</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="comment" name="comment"  style="width: 100%;">
                    </div>
                </div>


                <div class="mb-3">
                    <span class="form-label">instagram permission :</span>
                    <div class="input-group" style="width: 100%;">
                        <input type="checkbox" id="instagram_permission" name="instagram_permission"  style="width: 100%;">
                        <label for="instagram_permission" class="btn ig-permission">yes</label>
                        
                    </div>
                </div>

                <div class="mb-3">
                    <label for="instagram_account" class="form-label">instagram account:</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="instagram_account" name="instagram_account"  style="width: 100%;">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>


            </form>
        </div>
        
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
