@push('css')
<link rel="stylesheet" href="{{ asset('/css/news-dashboard.css')  }}" >
@endpush

<div class="news-dashboard-bottom-box">
    <a href="{{ route('news.event') }}" data-text="Local Events">
        <img src="{{ asset('img/event.jpg') }}" alt="Local Events">
    </a>
    <a href="{{ route('news.hotel-info') }}" data-text="Hotel Information">
        <img src="{{ asset('img/hotel-info.jpg') }}" alt="Hotel Information">
    </a>
    <a href="{{ route('news.japan-culture') }}" data-text="Japanese Culture">
        <img src="{{ asset('img/japan-culture.jpg') }}" alt="Japanese Culture">
    </a>
    <a href="{{ route('news.others') }}" data-text="Other Recommendations">
        <img src="{{ asset('img/others.jpg') }}" alt="Other Recommendations">
    </a>
</div>




