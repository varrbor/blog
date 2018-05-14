<div class="container ">
    <div class="row justify-content-center login-block">
        <div class="col-md-8">
            <div class="card">
                <div style="height: 40px; width: 90px; text-align: center; padding-top: 10px; background-color: #ffd015;">
                    <a href="{{URL::to('create')}}"> create </a>
                </div>
                <br>

                <table id="table_id" class="display">
                    <thead>
                    <tr>
                        <th>Post Id</th>
                        <th>Post Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td><a href="{{URL::to('edit/'.$post->id)}}"> <img src="{{asset('img/edit-document.svg')}}" height="15" width="15"> </a></td>
                            <td><img src="{{asset('img/dustbin.svg')}}"height="15" width="15"       onclick="delt({{$post->id}})"></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
