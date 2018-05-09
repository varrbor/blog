<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Post;

class PostController extends Controller
{
    public function Index($id)
    {
        $post = DB::table('users')
            ->select('users.name AS user_name','posts.*','categories.name AS category','categories.id AS category_id')
            ->join('users_has_posts','users.id','=','users_has_posts.users_id')
            ->join('posts','posts.id','=','users_has_posts.posts_id')
            ->join('posts_has_categories','posts.id','=','posts_has_categories.posts_id')
            ->join('categories','posts_has_categories.categories_id','=','categories.id')
            ->where('posts.id',$id)
            ->first();
//echo '<pre>';
//print_r($post);
//echo '</pre>';
//die();
        return view('page/post',[
            'title' => 'Home',
            'post' => $post
        ]);

    }
}
