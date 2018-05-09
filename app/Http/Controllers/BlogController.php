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
            ->select('users.name AS user_name','posts.*')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->get();

//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';
//        die();

        return view('page/main',[
                    'title' => 'Home',
                    'posts' =>$posts
                ]);
    }

    public function Post()
    {
//        $tasks=DB::table('tasks')->get();
//        return $tasks;
        return view('page/post',[
            'title' => 'Home',
        ]);
    }
}
