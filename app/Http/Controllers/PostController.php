<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = DB::table('users')
            ->select('users.name AS user_name','posts.*','categories.name AS category','categories.id AS category_id')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->join('posts_has_categories','posts.id','=','posts_has_categories.posts_id')
            ->join('categories','posts_has_categories.categories_id','=','categories.id')
            ->where('posts.id',$id)
            ->first();

        $categories = DB::table('categories as c')
            ->select('c.*')
            ->get();
        foreach ($categories as $key=>$category){

            $categories[$key]->count = DB::table('posts_has_categories')->where('categories_id',$category->id)->count();
        }
        return view('page/post',[
            'title' => 'Home',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostsByUserId()
    {
        print_r(Auth::user()->id);

        $posts = DB::table('users')
            ->select('users.name AS user_name','posts.*','categories.name AS category','categories.id AS category_id')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->join('posts_has_categories','posts.id','=','posts_has_categories.posts_id')
            ->join('categories','posts_has_categories.categories_id','=','categories.id')
            ->where('users_has_posts.users_id',Auth::user()->id)
            ->get();
//        echo '<pre>';
//var_dump($posts);die();
//echo ('</pre>');
        $categories = DB::table('categories as c')
            ->select('c.*')
            ->get();
        foreach ($categories as $key=>$category){

            $categories[$key]->count = DB::table('posts_has_categories')->where('categories_id',$category->id)->count();
        }

        return view('page/posts',[
            'title' => 'Home',
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = DB::table('categories as c')
            ->select('c.*')
            ->get();

        return view('page/create',[
            'title' => 'Home',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user      = auth()->user();

        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'category'   => 'required',
            'title'   => 'required',
            'content'   => 'required',


        ]);

        if ($validator->fails()) {
            return response([
                'error' => [
                    'message'    => 'validation error',
                    'attributes' => $validator->errors(),
                ],
            ]);
        }

        $e= new Post();
        $post_id=$e::create($request->all());
        $request['user_id'] = $user->id;
        $post_id->categories()->attach($_POST['category']);
        $post_id->users()->attach($user->id);

        if ($post_id)
        {
            return redirect('posts');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo '<pre>';
        print_r($id);
        echo '</pre>';
        die();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


