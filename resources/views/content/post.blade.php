<div class="blg-blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="blg-one-post-panel">
                 @include('modules.social_vertical')
                    <div class="blg-blog-post">
                        <a href="javascript:void(0)" class="blg-border">
                            <img src="{{ asset('img/be7.jpg') }}" alt="" class="img-responsive">
                        </a>
                        <div class="blg-caption">
                            <p class="blg-caption-p">In <a href="javascript:void(0)">{{$post->category}}</a></p>
                            <h6 class="blg-caption-p"><a href="javascript:void(0)">{{$post->name}}</a></h6>
                            <p class="blg-caption-p">By <a href="javascript:void(0)">{{$post->user_name}}</a></p>
                            <p class="text-center">{{$post->content}}</p>
                            <a href="{{asset('/')}}" class="btn" role="button">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('content.panel.right')
        </div>
    </div>
</div>
