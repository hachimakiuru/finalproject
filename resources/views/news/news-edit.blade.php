<from action="{{ route('news.update',$newsTimeLine -> id) }}" method="POST">
    @csrf
    @method('put')

    <div>
        <div>
            <label for="">タイトル</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">内容</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">場所</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">値段</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">その他</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">日付</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
        <div>
            <label for="">写真</label>
            <input type="text" class="form-control" id="" name="title" value="">
        </div>
    
        
        <div>
            image: <img src="{{ asset('storage/img/' . $newsTimeLine->image) }}" alt="" width="100" height="100">
        </div>
    </div>

    <a href="#">update</a>
</from>