<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Post;

class CategoryController extends Controller
{
    public function Index()
    {
        //
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

    public function getCategoriesPosts($id)
    {
        $posts = DB::table('users')
            ->select('users.name AS user_name','posts.*','categories.name AS category','categories.id AS category_id')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->join('posts_has_categories','posts.id','=','posts_has_categories.posts_id')
            ->join('categories','posts_has_categories.categories_id','=','categories.id')
            ->where('posts_has_categories.categories_id',$id)
            ->get();

        $categories = DB::table('categories as c')
            ->select('c.*')
            ->get();

        foreach ($categories as $key=>$category){

            $categories[$key]->count = DB::table('posts_has_categories')->where('categories_id',$category->id)->count();
        }
        return view('page/main',[
            'title' => 'Home',
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
