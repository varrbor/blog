<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class BlogController extends Controller
{
    public function Index()
    {
        $posts = DB::table('users')
            ->select('users.name AS user_name','posts.*','categories.name AS category','categories.id AS category_id')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->join('posts_has_categories','posts.id','=','posts_has_categories.posts_id')
            ->join('categories','posts_has_categories.categories_id','=','categories.id')
            ->get();

        $categories = DB::table('categories as c')
            ->select('c.*')

            ->get();
        foreach ($categories as $key=>$category){

            $categories[$key]->count = DB::table('posts_has_categories')->where('categories_id',$category->id)->count();
        }

        return view('page/main',[
                    'title' => 'Home',
                    'posts' =>$posts,
                    'categories' => $categories
                ]);
    }

    public function Post()
    {

        return view('page/post',[
            'title' => 'Home',
        ]);
    }
}
