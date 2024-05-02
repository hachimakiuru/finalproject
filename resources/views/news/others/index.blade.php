

@extends('layouts.layout')

@section('content')

@include('parts.success-message')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-15">
            <div class="restaurant-dashboard-container">
                <div class="restaurant-dashboard-center">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="{{ route('news.event') }}"><i class="ri-arrow-left-fill"></i></a><h4>Other Recommendations</h4><a href="{{ route('news.japan-culture') }}"><i class="ri-arrow-right-fill"></i></a>
                            @if (Auth::user()->role_id == 1)  
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Post ></button>
                            @endif
                        </div>

                        {{-- 投稿モーダル --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create New Post </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="username" class="col-sm-2 col-form-label">User Name</label>
                                                <div class="col-sm-10">
                                                    <p>{{Auth::user()->name }}</p>
                                                    @error('user_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="news-option">
                                                <label for="genre" class="news-option-form">Categories</label>
                                                <select name="genre_id" id="genre">
                                                    <option value="3">Japanese Culture</option>
                                                    <option value="2">Hotel Information</option>
                                                    <option value="4">Other Recommendations</option>
                                                    <option value="1">Local Events</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="">
                                                    @error('title')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="start" class="col-sm-2 col-form-label">Event Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" id="start" name="start" class="form-control @error('start') is-invalid @enderror" value="">
                                                    @error('start')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="place" class="col-sm-2 col-form-label">Place</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="place" name="place" class="form-control @error('place') is-invalid @enderror" value="">
                                                    @error('place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="place" class="col-sm-2 col-form-label">Content</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="content" name="content" class="form-control @error('place') is-invalid @enderror" value="">
                                                    @error('place')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="price" name="price"  placeholder="~yen ＊rough price" class="form-control @error('price') is-invalid @enderror" value="">
                                                    @error('price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                            <div class="mb-3 row">
                                                <label for="others" class="col-sm-2 col-form-label">Others</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="others" name="others" class="form-control @error('others') is-invalid @enderror" value="">
                                                    @error('others')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="image" class="col-sm-2 col-form-label">Photo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                         
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Share</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         {{-- 投稿モーダル --}}
                        




                        <div class="card-body" style="overflow-y: auto; max-height: 92vh;">
                            <ul class="list-group">
                                @foreach($newsTimeLines as $newsTimeLine)
                                <li class="list-group-item" style="background-color: #f8f9fa; border: 1px solid #ced4da; border-radius: 8px;">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/img/' . $newsTimeLine->image)}}" class="img-thumbnail" alt="restaurant photo" style="width: 50%; height: auto; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h3 class="news-title1">{{ \Carbon\Carbon::parse($newsTimeLine->start)->format('Y-m-d') }}</h3>
                                            <p class="news-title2">{{ $newsTimeLine->title }}</p>
                                            <p class="news-title2">{{ $newsTimeLine->place }}</p>
                                            <!-- モーダルトリガーボタン -->
                                            <button type="button" class="btn btn-border-shadow btn-border-shadow--color2 custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $newsTimeLine->id }}">
                                                Details & Reservation Form >
                                            </button>


<!-- 詳細&予約モーダル始 -->
<div class="modal fade" id="exampleModal_{{ $newsTimeLine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details & Reservation Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
            {{-- モーダルbody --}}
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- 詳細情報 -->
                        <div class="col-md-7">
                            <div class="detail p-4">
                                <div class="detail">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/img/' . $newsTimeLine->image) }}" class="img-fluid rounded shadow-lg mb-4" alt="restaurant photo" style="max-width: 100%;">
                                    </div>
                                    <p><strong>User Name:</strong> {{ $newsTimeLine->user->name }}</p>
                                    <p><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($newsTimeLine->start)->format('Y-m-d') }}</p>
                                    <p><strong>Place:</strong> {{ $newsTimeLine->content }}</p>
                                    <p><strong>Content:</strong> {{ $newsTimeLine->place }}</p>
                                    <p><strong>Price:</strong> {{ $newsTimeLine->price }}~yen ＊rough pric</p>
                                    <p><strong>Others:</strong> {{ $newsTimeLine->others }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- 予約フォーム -->
                        <div class="form bg-light p-5 rounded ms-md-4" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 400px;">
                            <h2 class="mb-4 text-center" style="font-size: 1.5rem; color: #333;">Reservation Form</h2>
                            <div class="booking">
                                <form action="{{ route('news-booking.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="news_time_line_id" value="{{ $newsTimeLine->id }}">

                                    <div class="mb-3">
                                        <label for="day">Desired Date:</label>
                                        <input type="date" id="day" name="day" class="form-control" value="#" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="time1">First Preferred Time:</label>
                                        <select id="time1" name="time1" class="form-control" required>
                                            <option value="">-- Please select a time --</option>
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

                                    <div class="mb-3">
                                        <label for="time2">Second Preferred Tim:</label>
                                        <select id="time2" name="time2" class="form-control" required>
                                            <option value="">-- Please select a time --</option>
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

                                    <div class="mb-3">
                                        <label for="number_guests">Number of Guests:</label>
                                        <select id="number_guests" name="number_guests" class="form-control" required>
                                            <option value="">-- Please select --</option>
                                            <option value="1">1person</option>
                                            <option value="2">2person</option>
                                            <option value="3">3person</option>
                                            <option value="4">4person</option>
                                            <option value="5">5person</option>
                                            <option value="6">6person</option>
                                            <option value="7">7person</option>
                                            <option value="8">8person</option>
                                            <option value="9">9person</option>
                                            <option value="10">More than 10 people</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="memo">Memo:</label>
                                        <textarea id="memo" name="memo" class="form-control"></textarea>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn-border">Make a Reservation</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="modal-footer">
                <!-- フッターの内容 -->
                @if (Auth::user()->role_id == 1 || Auth::id() == $newsTimeLine->user_id)  
                <div class="container-fluid">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-auto">
                            <form action="{{ route('news.news-edit' , $newsTimeLine -> id) }}">
                                <button type="submit" class="btn btn-primary" data-bs-target="#editModal_{{ $newsTimeLine->id }}">
                                    <i class="ri-edit-2-line"></i>
                                </button>
                            </form>
                        </div>                                                        
                        <div class="col-md-auto">
                            <div class="btn-group" role="group" aria-label="アクション">
                                <form action="{{ route('news.destroy', $newsTimeLine -> id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!--詳細&予約モーダル終 -->





                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
