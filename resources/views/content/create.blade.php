<div class="container ">
    <div class="row justify-content-center login-block">
        <div class="col-md-8">
            <div class="card">
                {{ Form::open(array('url' => 'foo/bar')) }}
                //
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>