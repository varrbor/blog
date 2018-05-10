<article>
    <div class="head-panel"><h6>CATEGORIES</h6></div>
    <ul class="list-unstyled blg-categories">
        @foreach($categories as $category)
            <li><a href=" {{URL::to('category/'.$category->id)}}">{{$category->name}} ({{$category->count}})</a></li>
        @endforeach
    </ul>
</article>