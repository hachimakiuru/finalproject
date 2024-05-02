
    {{-- レイアウトのお試し --}}
@extends('layouts.layout')

@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('/css/experience_blade.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/onepage_experience_blade.css') }}">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <style>
        header {
            position: unset!important;
        }
    </style>
@endpush
@section('content')  



    
    
@include('layouts.header')


<div class="d-flex justify-content-center p-3">
    <button class="btn btn-border-shadow btn-border-shadow--color2 custom-btn" data-bs-toggle="modal" data-bs-target="#test">Share your memories!</button>
</div>
<div>
    <p class='experience-index-instagram'>Check our official Instagram
        <a href="https://www.instagram.com/hoshinoresorts.official/" target="blank" style="text-decoration: none;"><i class="ri-instagram-line" style="color: #colorcode;"></i></a>
    </p>
</div>



<div class="container">
<div class="row row-cols-1 row-cols-md-5 gx-1 g-4 mb-3 ">
    @foreach($experiences as $key => $experience)
    <div class="col">
        <div class="card custom-card">
            <div class='postimg'>
                <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $experience->title }}</h5>
                <h5 class="modalforpostnumber">#{{ $experience->id }}</h5>
                <h5 class="card-updatedat">update date：{{ $experience->updated_at ->format('F j, Y')}}</h5>
                <button type="button" class="btn btn-primary detail-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}"><i class="ri-more-line"></i></button>
               
                {{-- 投稿者のみ更新・削除ボタンを表示開始 --}}
                @if (Auth::user()->role_id == 1 || Auth::id() == $experience->user_id)                    
               
                <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-button"><i class="ri-delete-bin-line"></i></button>
                </form>

                <button type="button" class="btn btn-primary update-button" data-bs-toggle="modal" data-bs-target="#updateModal{{ $key }}" data-title="{{ $experience->title }}" data-address="{{ $experience->address }}" data-content="{{ $experience->content }}" data-image="{{ asset('storage/img/' . $experience->image_path) }}" data-id="{{ $experience->id }}"><i class="ri-edit-2-line"></i></button>
                @endif

                {{-- 投稿者のみ更新・削除ボタンを表示開始 --}}

                {{-- likeボタンの作成 --}}
                <div class="btn-container" id="target{{ $experience->id }}">
                    @if ($experience->isLike)
                        {{-- <form action="{{ route('like.destroy', $experience->id) }}" method="POST" class="likebutton">
                            @csrf
                            @method('DELETE') --}}
                            <button id="unlike" onclick="unlike({{ $experience->id }})"><i class="ri-heart-fill"></i></button>
                        {{-- </form> --}}
                    @else
                        {{-- <form action="{{ route('like.store', $experience->id) }}" method="POST" class="likebutton"> --}}
                            {{-- @csrf --}}
                            <button id="like" onclick="like({{ $experience->id }})"><i class="ri-heart-line"></i></button>
                        {{-- </form> --}}
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
                <h5 class="modal-title" id="updateModalLabel{{ $key }}">Update this posting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm{{ $key }}" action="{{ route('experience.update', $experience->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="updateTitle{{ $key }}">Post</label>
                        {{-- <input type="text" class="form-control" id="updateTitle{{ $key }}" name="title" value="{{ $experience->title }}"> --}}
                        <textarea placeholder="e.g. I wennt to Disney land" name="title" id="updateTitle{{ $key }}" class="form-control" cols="100" rows="5">{{ $experience->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="updateAddress{{ $key }}">location</label>
                        <input type="text" class="form-control" id="updateAddress{{ $key }}" name="address" value="{{ $experience->address }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="updateContent{{ $key }}">comment</label>
                        <textarea class="form-control" id="updateContent{{ $key }}" name="content" rows="3">{{ $experience->content }}</textarea>
                    </div> --}}

                    <div class="mb-3">
                        <span class="form-label">instagram permission *click the button if you don't mind :</span>
                        <div class="input-group" style="width: 100%;">
                            <input type="checkbox" id="instagram_permission{{ $experience->id }}" name="instagrampermission"  style="width: 100%;" @if ($experience->ig_permission)
                                checked
                            @endif>
                            <label for="instagram_permission{{ $experience->id }}" class="btn ig-permission">share my memory on Instagram</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="updateImage{{ $key }}">Pick your memory</label>
                        <input type="file" class="form-control" id="updateImage{{ $key }}" name="image" accept="image/*">
                    </div>
                </br>
                    <div class="mb-3">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </div>
                </div>

                </form>

        </div>
    </div>
</div>


    


    <!-- 詳細のためのモーダル -->
    <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $key }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $key }}">＃{{ $experience->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/img/' . $experience->image_path) }}" class="card-img-top" alt="...">
                    <p><strong></strong> {{ $experience->title }}</p>
                    <p><strong>location:</strong> {{ $experience->address }}</p>
                    <p><strong>Instagram account:</strong> {{ $experience->ig_account }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            {{ $experiences->links() }} {{-- ページネーションリンクの表示 --}}
        </div>
    </div>
</div>

<!-- 新規投稿のためのモーダル -->
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
                        {{-- <button type="submit" class="uploadbutton">＋</button> --}}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Post:</label>
                    <div class="input-group" style="width: 100%;">
                        {{-- <input type="text" id="title" name="title"  style="width: 100%;"> --}}
                        <textarea placeholder="e.g. I wennt to Disney land" name="title" id="title" cols="100" rows="5"></textarea>
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label for="content" class="form-label">comment :</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="content" name="content"  style="width: 100%;">
                    </div>
                </div> --}}
                
                <div class="mb-3">
                    <label for="address" class="form-label">location :</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="address" name="address"  style="width: 100%;" placeholder="e.g. Disney land">
                    </div>
                </div>

                <div class="mb-3">
                    <span class="form-label">instagram permission *click the button if you don't mind :</span>
                    <div class="input-group" style="width: 100%;">
                        <input type="checkbox" id="instagram_permission" name="instagrampermission"  style="width: 100%;">
                        <label for="instagram_permission" class="btn ig-permission">share my memory on Instagram</label>
                        
                    </div>
                </div>

                <div class="mb-3">
                    <label for="instagram_account" class="form-label">instagram account:</label>
                    <div class="input-group" style="width: 100%;">
                        <input type="text" id="instagramaccount" name="instagramaccount"  style="width: 100%;" placeholder="e.g. @hoshinoresorts.official">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post!</button>
                    </div>
                </div>

            </form>
        </div>
        
    </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
    $(document).ready(function() {
        const header = $('.header')
        header[1].style.display = "none"
    });

</script>
    




{{-- </body> --}}
{{-- </html> --}}
