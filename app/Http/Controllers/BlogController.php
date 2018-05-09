<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function Index()
    {
        $posts=DB::table('posts')->get();
//echo '<pre>';
//print_r($posts);
//echo '</pre>';
//die();
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
