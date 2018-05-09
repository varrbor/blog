
<article>
    <div class="head-panel"><h6>CATEGORIES</h6></div>
    <ul class="list-unstyled blg-categories">

        @foreach($categories as $category)
            <li><a href="javascript:void(0)">{{$category->name}} (13)</a></li>
        @endforeach

    </ul>
</article>