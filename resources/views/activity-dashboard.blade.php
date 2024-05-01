@extends('layouts.layout')
@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/activity-dasboad-blade.css')  }}" >
    <link rel="stylesheet" href="{{ asset('/css/experience_blade.css') }}">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <style>
        header {
            position: unset!important;
        }
    </style>
@endpush
<div class="containerfullpage" style="paddin-inline: 50px;">
    <div class="container" style="gap:17px;">
        <!-- 左半分 -->
        <div class="left">
            <!-- カレンダー -->
            <div class="top-box">
            <div id='calendar'></div>
            </div>
            <!-- ニュース -->
            <div class="bottom-box" style="margin:17px 0px 10px 0px;">
                @include('news.news-dashboard')
            </div>
        </div>
            <!-- カレンダー詳細モーダル-->
            <div class="modal fade" id="eventsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Events</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="dateResult">       
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                </div>
            </div>
        
        <!-- アクティビティ -->
            <div class="right overflow-scroll">
                <div class="d-flex justify-content-center p-3">
                    <button class="btn custom-button" data-bs-toggle="modal" data-bs-target="#test">share your memories!!</button>
                </div>
                <div>
                    <p class='experience-index-instagram'>Check our officieal Instagram
                        <a href="https://www.instagram.com/hoshinoresorts.official/" target="blank" style="text-decoration: none;"><i class="ri-instagram-line" style="color: #colorcode;"></i></a>
                    </p>
                </div>
{{-- 
                <div class="moreposts">
                    <p class='experience-index-instagram'>check more posts
                    <a href="{{ route('experience.index') }}" ><i class= "ri-gallery-line" style="color: #colorcode;"></i>
                    </a>
                </div>  --}}



                <!-- ポンポン投稿カードのコメント -->
                {{-- <div class="d-flex flex-wrap justify-content-center custom-container"> --}}
                    <div class="postgaps custom-container"> 
                    {{-- @foreach($experiences->reverse() as $key => $experience) --}}
                    @foreach($experiences as $key => $experience)

                    <div class="col custom-col">
                        <div class="card custom-card">
                            <div class='postimg'>
                                <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
                            </div>
                            {{-- <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">comment：{{ $experience->title }}</h5>
                                <div class="btn-container" id="target{{ $experience->id }}">
                                @if(Auth::user()->role_id == 1)
                                    <h5 class="card-updatedat">更新日：{{ $experience->updated_at }}</h5>
                                    <button type="button" class="btn btn-primary detail-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}">詳細</button>
                                    <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-button">削除</button>
                                    </form>
                                    <button type="button" class="btn btn-primary update-button" data-bs-toggle="modal" data-bs-target="#updateModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}" data-id="{{ $experience->id }}">更新</button>
                                @endif
                            </div> --}}

{{--                             
                        </div>
                                {{-- likeボタンの作成 --}}
                                {{-- <div class="btn-container" id="target{{ $experience->id }}">
                                    @if ($experience->isLike)
                                            <button id="unlike" onclick="unlike({{ $experience->id }})"><i class="ri-heart-fill"></i></button>
                                    @else
                                            <button id="like" onclick="like({{ $experience->id }})"><i class="ri-heart-line"></i></button>
                                    @endif
                                </div>
                                
                            </div> --}}
                            
                            <div class="card-body">
                                
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="card-title mb-0">{{ $experience->title }}</h1> 
                            <div class="btn-container" id="target{{ $experience->id }}">
                                @if ($experience->isLike)
                                    <button id="unlike" onclick="unlike({{ $experience->id }})"><i class="ri-heart-fill"></i></button>
                                @else
                                    <button id="like" onclick="like({{ $experience->id }})"><i class="ri-heart-line"></i></button>
                                @endif
                        </div>
    </div>
    <div>
        <h1 class="modalforpostnumber fs-5" id="exampleModalLabel{{ $key }}"># {{ $experience->id }}</h1>
    </div>



    @if(Auth::user()->role_id == 1)
        <h5 class="card-updatedat">Update date：{{ $experience->updated_at->format('F j, Y') }}</h5>
        <button type="button" class="btn btn-primary detail-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}">Details</button>
        <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-button">Delete</button>
        </form>
        <button type="button" class="btn btn-primary update-button" data-bs-toggle="modal" data-bs-target="#updateModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}" data-id="{{ $experience->id }}">Update</button>
    @endif
</div>
                        </div> 
                </div>
                
                <!-- 更新用のモーダル -->
                <div class="modal fade" id="updateModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $key }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel{{ $key }}">投稿を更新するよ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateForm{{ $key }}" action="{{ route('experience.update', $experience->id) }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="updateTitle{{ $key }}">タイトル</label>
                                        <input type="text" class="form-control" id="updateTitle{{ $key }}" name="title" value="{{ $experience->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="updateAddress{{ $key }}">住所</label>
                                        <input type="text" class="form-control" id="updateAddress{{ $key }}" name="address" value="{{ $experience->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="updateContent{{ $key }}">内容</label>
                                        <textarea class="form-control" id="updateContent{{ $key }}" name="content" rows="3">{{ $experience->content }}</textarea>
                                    </div>
                
                                    <div class="mb-3">
                                        <span class="form-label">instagram permission :</span>
                                        <div class="input-group" style="width: 100%;">
                                            <input type="checkbox" id="instagram_permission{{ $experience->id }}" name="instagrampermission"  style="width: 100%;" @if ($experience->ig_permission)
                                                checked
                                            @endif>
                                            <label for="instagram_permission{{ $experience->id }}" class="btn ig-permission">投稿可能な場合はこちらをクリック</label>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="updateImage{{ $key }}">画像を選択してください</label>
                                        <input type="file" class="form-control" id="updateImage{{ $key }}" name="image" accept="image/*">
                                    </div>
                                </br>
                                    <div class="mb-3">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">更新</button>
                                        </div>
                                    </div>
                                </div>
                
                                </form>
                
                        </div>
                    </div>
                </div>

                <!-- ポンポン投稿の詳細 -->
                    <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $key }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $key }}">＃{{ $experience->id }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
                                    <p><strong></strong> {{ $experience->content }}</p>
                                    <p><strong>location:</strong> {{ $experience->address }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>

            <div class="moreposts">
                <p class='experience-index-instagram text-center d-flex justify-content-center'>check more posts
                <a href="{{ route('experience.index') }}" ><i class= "ri-gallery-line" style="color: #colorcode;"></i></a>
                </p>
            </div>

            <!-- 詳細モーダル始 -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <!-- ページ1の内容 -->
                                <div class="page" id="page1">
                                    <div class="row">
                                    </div>
                                </div>
                                {{-- ページ2の内容 予約フォーム--}}
                                <div class="page" id="page2">
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h2>予約フォーム</h2>
                                            <form action="{{ route('activity.dashboard.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @foreach($newsBooking as  $newsBooking)
                                                <input type="number" name="news_time_line_id" value="{{$newsBooking->news_time_line_id }}" hidden>
                                                @endforeach
                                                <div class="form-group">
                                                    <label for="day">希望日:</label>
                                                    <input type="date" id="day" name="day" class="form-control" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="time1">第一希望時間:</label>
                                                    <select id="time1" name="time1" class="form-control" required>
                                                        <option value="">-- 時間を選択してください --</option>
                                                        <optgroup label="朝 (6:00 - 11:59)">
                                                            @for ($hour = 6; $hour < 12; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="昼 (12:00 - 17:59)">
                                                            @for ($hour = 12; $hour < 18; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="夕方 (18:00 - 21:59)">
                                                            @for ($hour = 18; $hour < 22; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="夜 (22:00 - 23:59)">
                                                            @for ($hour = 22; $hour < 24; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="time2">第二希望時間:</label>
                                                    <select id="time2" name="time2" class="form-control" required>
                                                        <option value="">-- 時間を選択してください --</option>
                                                        <optgroup label="朝 (6:00 - 11:59)">
                                                            @for ($hour = 6; $hour < 12; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="昼 (12:00 - 17:59)">
                                                            @for ($hour = 12; $hour < 18; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="夕方 (18:00 - 21:59)">
                                                            @for ($hour = 18; $hour < 22; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                        <optgroup label="夜 (22:00 - 23:59)">
                                                            @for ($hour = 22; $hour < 24; $hour++)
                                                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                                            @endfor
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                <label for="number_guests">ゲスト人数:</label>
                                                <select id="number_guests" name="number_guests" class="form-control" required>
                                                    <option value="">-- 選択してください --</option>
                                                    @for ($i = 1; $i <= 9; $i++)
                                                        <option value="{{ $i }}">{{ $i }}人</option>
                                                    @endfor
                                                    <option value="10">10人以上</option>
                                                </select>
                                            </div>
                                
                                                
                                                <div class="form-group">
                                                    <label for="memo">メモ:</label>
                                                    <textarea id="memo" name="memo" class="form-control"></textarea>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">予約する</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                                
                    </div>
                </div>
                
            </div>
            <!-- モーダル終 -->

              <!-- ポンポン投稿用のモーダル-->
              <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">share your memories!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data"> <!-- formタグの開始を修正 -->
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Pick your memory</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Post:</label>
                                {{-- <div class="input-group" style="width: 100%;"> --}}
                                    <div class="input-group" style="width: 100%;">
                                    {{-- <input type="text" id="title" name="title"  style="width: 100%;"> --}}
                                    <textarea placeholder="e.g. I wennt to Disney land" name="title" id="title" cols="100" rows="5"></textarea>
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label for="address" class="form-label">Location :</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" id="address" name="address"  style="width: 100%;" placeholder="e.g. Disney land">
                            </div>
            
                            {{-- <div class="mb-3">
                                <label for="content" class="form-label">comment :</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" id="content" name="content"  style="width: 100%;">
                                </div>--}}
                            </div> 
                            <div class="mb-3">
                                <label  class="form-label" for=""> Instagram Permission: </label>
                                <h6 class=" text-sm fs-6 text-danger" >*click the button if you don't mind :</h6>
                                <div class="input-group" style="width: 100%;">
                                    <input type="checkbox" id="instagram_permission" name="instagrampermission"  style="width: 100%;">
                                    <label for="instagram_permission" class="btn ig-permission">share my memory on Instagram</label>
                                    
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label for="instagram_account" class="form-label">Instagram Account:</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" id="instagramaccount" name="instagramaccount"  style="width: 100%;" placeholder="e.g. @hoshinoresorts.official">




                                </div>
                            </div>
            
                            <div class="mb-3">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Post！</button>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var calendarEvents = @json($events)


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            height: 420,
            initialView: 'dayGridMonth',
        // initialView: 'dayGridWeek',
        displayEventTime : false,
        dateClick: function(info) {
            calendar.updateSize()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Step 1: Parse the date
            const date = new Date(info.date);

            // Step 2: Extract components
            const year = date.getFullYear();  // gets the year
            let month = date.getMonth() + 1;  // getMonth() returns 0-11, so add 1
            let day = date.getDate();         // gets the day of the month

            // Step 3: Pad the month and day with leading zeros if necessary
            month = month < 10 ? '0' + month : month;
            day = day < 10 ? '0' + day : day;
            const newDate = `${year}-${month}-${day}`

            $.ajax({
                type: 'GET',
                url: `/calendar/search`,
                data: {
                    date: newDate
                },
                success: function(data) {
                    $('#dateResult').empty();

                    if (data.length === 0) {
                    // データが空の場合
                    $('#dateResult').append('<div class="no-information">NO EVENTS TODAY</div>');
                    } else {
                    data.forEach(d => {
                        var $container = $('<div></div>').addClass('parent');

                        // 日付のみを取得して表示するように修正
                        var dateParts = d.start.split(' '); // 空白で日付と時間を分割
                        var dateOnly = dateParts[0]; // 日付部分のみを取得 ("YYYY-MM-DD")
                        var $start = $('<div></div>').addClass('item').text("Event Date: " + dateOnly);


                        var $user_id = $('<div></div>').addClass('item');
                        var $title = $('<div></div>').addClass('item').text("Title: " + d.title);
                        var $content = $('<div></div>').addClass('item').text("Details: " + d.content);   
                        var $image = $('<div></div>').addClass('item').text(d.image);
                        var $price = $('<div></div>').addClass('item').text("Price(¥): " + d.price);   
                        var $place = $('<div></div>').addClass('item').text("Location: " + d.place);   
                        var $others = $('<div></div>').addClass('item').text("Others: " + d.others);   
                        
                        // var $btn = $('<a></a>').addClass('item').text('reservation').attr({
                        //     'href': '#exampleModal',
                        //     'data-bs-toggle': 'modal',
                        //     'data-bs-target': '#exampleModal'
                        // });

                        var $btn = $('<button></button>') // Changed from <a></a> to <button></button>
                        .addClass('btn btn-warning item') // Add Bootstrap button classes
                        .text('Reservation')
                        .attr({
                            'data-bs-toggle': 'modal',
                            'data-bs-target': '#exampleModal'
                        });

                        $container.append($user_id);
                        $container.append($title);
                        $container.append($content);
                        $container.append($image);
                        $container.append($start);
                        $container.append($price);
                        $container.append($place);
                        $container.append($others);
                        $container.append($btn);
                        $('#dateResult').append($container);
                    });
                }
                    $('#eventsModal').modal('toggle');
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        },
            events: calendarEvents

        });
        calendar.render();
    });

</script>

@endsection