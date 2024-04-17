
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

<form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data"> <!-- formタグの開始を修正 -->
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">画像を選択してください</label>
        <div class="input-group" style="width: 100%;">
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <button type="submit" class="uploadbutton">＋</button>
        </div>
    </div>
</form>

<div class="layooutfortododiary">
    <div class="row row-cols-1 row-cols-md-4 g-4 ">

        @foreach($experiences->reverse() as $experience)
        <div class="col">
            <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
                <div class='postimg'>
                    <img src="{{ asset('storage/img/' . $experience->image) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <button class="backtotopthesite" style="text-decoration: none;" onclick="scrollToTop()">top
                    </button>

                    <script>
                        function scrollToTop() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                    </script>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
</body>
</html>
