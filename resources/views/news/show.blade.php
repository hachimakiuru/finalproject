<div>
    title: {{ $newsTimeLine->title }}
</div>

<div>
    content: {{ $newsTimeLine->content }}
</div>

<div>
    place: {{ $newsTimeLine->place }}
</div>

<div>
    price: {{ $newsTimeLine->price }}
</div>

<div>
    others: {{ $newsTimeLine->others }}
</div>

<div>
    day: {{ $newsTimeLine->day }}
</div>

<div>
    image: <img src="{{ asset('storage/img/' . $newsTimeLine->image) }}" alt="" width="100" height="100">
</div>

<tr>
    <td>
        <a href="{{ route('news.news-edit' , $newsTimeLine -> id) }}">編集</a>
        <from action="{{ route('news.destroy', $newsTimeLine -> id) }}" method='POST'>
            @csrf
            @method('delete')
                <input type="submit" value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
        </from>
                {{-- <a href="#">destroy</a> --}}
    </td>
</tr>