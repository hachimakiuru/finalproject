@push('css')
<link rel="stylesheet" href="{{ asset('/css/news-dashboard.css')  }}" >
@endpush

<div class="news-dashboard-bottom-box">
    <a href="{{ route('news.index', ['type' => 'event']) }}" data-text="ローカルイベント">
        <img src="{{ asset('img/event.jpg') }}" alt="ローカルイベント">
    </a>
    <a href="{{ route('news.index', ['type' => 'hotel-info']) }}" data-text="ホテルからのお知らせ">
        <img src="{{ asset('img/hotel-info.jpg') }}" alt="ホテルからのお知らせ">
    </a>
    <a href="{{ route('news.index', ['type' => 'japan-culture']) }}" data-text="日本文化">
        <img src="{{ asset('img/japan-culture.jpg') }}" alt="日本文化">
    </a>
    <a href="{{ route('news.index', ['type' => 'others']) }}" data-text="その他おすすめ情報">
        <img src="{{ asset('img/others.jpg') }}" alt="その他おすすめ情報">
    </a>
</div>