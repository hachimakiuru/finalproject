<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Final Project</title>
  
  {{-- 独自cssの読み込み --}}
  <link rel="stylesheet" href="{{ asset('/css/global/reset.css')  }}" >
  <link rel="stylesheet" href="{{ asset('/css/global/header-blade.css')  }}" >
  <link rel="stylesheet" href="{{ asset('/css/global/common.css')  }}" >


  
  <link rel="stylesheet" href="{{ asset('/css/restaurant-dashboard.css')  }}" >
  <link rel="stylesheet" href="{{ asset('/css/rest-index.css')  }}" >
  <link rel="stylesheet" href="{{ asset('/css/rest-post.css')  }}" >
  @stack('css')

  {{-- Bootstrap5のCDN読み込み記述 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  {{-- iconの読み込み --}}
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>

<body>
  @include('layouts.header')
  <div>
    @yield('content')
  </div>


  {{-- Bootstrap、JSのCDN読み込み --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    
    
    <script>
        $('.detail-button').click(function() {
            var title = $(this).data('title');
            var address = $(this).data('address');
            var content = $(this).data('content');
            var image = $(this).data('image');
    
            $('#exampleModal .modal-title').text(title);
            $('#exampleModal .modal-body').html('<img src="' + image + '" class="card-img-top" alt="..."><p><strong>Address:</strong> ' + address + '</p><p><strong>Content:</strong> ' + content + '</p>');
        });
    </script>
    
        <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        function like(id) {
            
    
            $.ajax({
                type: 'POST',
                url: `/like/${id}`,
                success: function(data) {
                    $(`#target${id}`).empty();
                    var $button = $('<button></button>', {
                        id: 'unlike',
                        html: '<i class="ri-heart-fill"></i>',
                        click: function() { unlike(id); }
                    });
                    $(`#target${id}`).append($button);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    
        function unlike(id) {
    
            $.ajax({
                type: 'DELETE',
                url: `/unlike/${id}`,
                success: function(data) {
                    $(`#target${id}`).empty();
                    var $button = $('<button></button>', {
                        id: 'like',
                        html: '<i class="ri-heart-line"></i>',
                        click: function() { like(id); }
                    });
                    $(`#target${id}`).append($button);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    </script>
<script>
  document.getElementById('delete-user').addEventListener('click', function(){
      alert('aaaa');
    });
</script>

{{-- フラッシュメッセージの表示秒数の設定 --}}
<script>
    $(document).ready(function(){
        $(".alert-success").delay(1500).fadeOut("slow");
    });
</script>


</body>
</html>