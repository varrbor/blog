<div class="container ">
    <div class="row justify-content-center login-block">
        <div class="col-md-8">
            <div class="card">
                <div class="contact-area contact-area-v2 panel ptb-30 prl-20">
                    <div class="row row-tb-30">
                        <div class="col-xs-12">
                            <div class="contact-area-col contact-form">
                                <h3 class="t-uppercase h-title mb-20">New Post</h3>
                                {{ Form::open(array('url' => 'save', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required="required" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" id="category" class="form-control" required="required">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label>Photo</label>--}}
                                    {{--<input type="file" name="photo" class="form-control" required="required" placeholder="Your Name">--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label>Intro</label>
                                    <input type="text" name="intro" class="form-control" required="required" placeholder="Intro">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" rows="6" class="form-control" required="required" placeholder="Text..."></textarea>
                                </div>
                                <button class="btn">Submit</button>
                                {{ Form::close() }}
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>