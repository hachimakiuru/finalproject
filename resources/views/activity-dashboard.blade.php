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

    <div class="container">
        <!-- 左半分 -->
        <div class="left">
            <!-- カレンダー -->
            <div class="top-box">
                カレンダー機能

            <div id='calendar'></div>
            </div>
            <!-- ニュース -->
            <div class="bottom-box">
                @include('news.news-dashboard')
            </div>
        </div>

            
            <!-- カレンダー -->
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
                <button class="btn custom-button" data-bs-toggle="modal" data-bs-target="#exampleModal">写真投稿はこちら!</button>
            </div>
            <div>
                <p class='experience-index-instagram'>ホテル公式アカウントはこちら
                    <a href="https://www.instagram.com/hoshinoresorts.official/" target="blank" style="text-decoration: none;"><i class="ri-instagram-line" style="color: #colorcode;"></i></a>
                </p>
            </div>
            
            
            
            
            <div class="d-flex flex-wrap">
                @foreach($experiences->reverse() as $key => $experience)
                <div class="col">
                    <div class="card custom-card">
                        <div class='postimg'>
                            <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">タイトル：{{ $experience->title }}</h5>
                            <h5 class="card-updatedat">更新日：{{ $experience->updated_at }}</h5>
                            <button type="button" class="btn btn-primary detail-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}">詳細</button>
                            <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-button">削除</button>
                            </form>
                            <button type="button" class="btn btn-primary update-button" data-bs-toggle="modal" data-bs-target="#updateModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}" data-id="{{ $experience->id }}">更新</button>
            
            
                            {{-- likeボタンの作成 --}}
                            <div class="btn-container" id="target{{ $experience->id }}">
                                @if ($experience->isLike)
                                        <button id="unlike" onclick="unlike({{ $experience->id }})"><i class="ri-heart-fill"></i></button>
                                @else
                                        <button id="like" onclick="like({{ $experience->id }})"><i class="ri-heart-line"></i></button>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            <!-- 更新用のモーダル -->
            <div class="modal fade" id="updateModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $key }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel{{ $key }}">投稿を更新する</h5>
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
            
            
                
            
            
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $key }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $key }}">{{ $experience->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
                                <p><strong>Address:</strong> {{ $experience->address }}</p>
                                <p><strong>Content:</strong> {{ $experience->content }}</p>
                            </div>
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
                                    <input type="text" id="address" name="address"  style="width: 100%;">
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label for="content" class="form-label">comment :</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" id="content" name="content"  style="width: 100%;">
                                </div>
                            </div>
            
            
                            <div class="mb-3">
                                <span class="form-label">instagram permission :</span>
                                <div class="input-group" style="width: 100%;">
                                    <input type="checkbox" id="instagram_permission" name="instagrampermission"  style="width: 100%;">
                                    <label for="instagram_permission" class="btn ig-permission">投稿可能な場合はこちらをクリック</label>
                                    
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label for="instagram_account" class="form-label">instagram account:</label>
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" id="instagramaccount" name="instagramaccount"  style="width: 100%;">
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">投稿！</button>
                                </div>
                            </div>
            
                        </form>
                    </div>
                    
                </div>
                </div>
            </div>
            
            
            {{-- @endforeach --}}
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
                    data.forEach(d => {
                        var $container = $('<div></div>').addClass('parent');

                        var $user_id = $('<div></div>').addClass('item').text(d.user_id);
                        var $title = $('<div></div>').addClass('item').text(d.title);
                        var $content = $('<div></div>').addClass('item').text(d.content);   
                        var $image = $('<div></div>').addClass('item').text(d.image);
                        var $start = $('<div></div>').addClass('item').text(d.start);   
                        var $price = $('<div></div>').addClass('item').text(d.price);   
                        var $place = $('<div></div>').addClass('item').text(d.place);   
                        var $others = $('<div></div>').addClass('item').text(d.others);   
                        
                        var $btn = $('<a></a>').addClass('item').text('reservation').attr({
                            'href': '#exampleModal',
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