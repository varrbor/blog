<div class="blg-blog">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-8 col-lg-8">
                @foreach ($posts as $post)
                    <div class="col-sm-12 col-md-6 col-lg-6 lpadding text-center">

                        <a href="javascript:void(0)" class="blg-border">
                            <img src="{{$post->url}}" alt="" class="img-responsive">
                        </a>
                        <div class="blg-caption">
                            <p class="blg-caption-p">In <a href="javascript:void(0)">{{$post->category}}</a></p>
                            <h6 class="blg-caption-p">{{$post->name}}</h6>
                            <p class="blg-caption-p">12 April | By <a href="javascript:void(0)">{{$post->user_name}}</a></p>
                            <p class="text-center">{{$post->intro}}</p>
                        </div>
                        @include('modules.social_horizontal')
                        <a href="{{URL::to('post/'.$post->id)}}" class="btn" role="button">Read More</a>
                        <hr>
                    </div>
                @endforeach

                <hr>
                <!--=========PAGINATION=========-->
                <ul class="pagination">
                    <li class="previous"><a href="javascript:void(0)">&laquo;</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li class="next"><a href="javascript:void(0)">&raquo;</a></li>
                </ul>
                <!--=========END PAGINATION=========-->
            </div>
            @include('content.panel.right')
        </div>
    </div>
</div>
