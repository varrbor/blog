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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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


