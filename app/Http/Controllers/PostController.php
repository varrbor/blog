<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Post;
use Illuminate\Support\Facades\Auth;

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
        $rules = array(
            'name'       => 'required',
            'title'      => 'required',
            'anons'     => 'required',
            'content'     => 'required',
            'photo'     => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('post/new')
                ->withErrors($validator);
        } else {
            // save
            $post = new Post;
            $post->name       = $request->get('name');
            $post->title      = $request->get('title');
            $post->anons      = $request->get('anons');
            $post->content    = $request->get('content');
            $post->category_id = $request->get('category');
            $categories = Category::all();
            $last = DB::table('posts')->orderBy('created_at', 'desc')->first();
            $current_id = $last->id+1;
            $post->url        = 'post/'.$current_id;
            $post->save();
            $file = request()->file('photo');
            if ($file) {
                // uploading pictures
                $ext = $file->guessClientExtension();
                $photo = new PostsPhoto();
                $photo->post_id = $current_id;
                $photo->filename = 'storage/posts/' . $current_id . '/' . $current_id  . '.' . $ext;
                $photo->save();
                $file->storeAs('public/posts/' . $current_id, $current_id  . '.' . $ext, 'local');
                $post->photo();
            } else {
                return Redirect::to('post/new');
            }
            // redirect
            Session::flash('message', 'Successfully created post!');
            return Redirect::to('posts');
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


