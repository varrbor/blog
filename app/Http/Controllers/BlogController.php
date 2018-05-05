<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function Index()
    {
//        $tasks=DB::table('tasks')->get();
//        return $tasks;
        return view('page/main',[
            'title' => 'Home',
        ]);
    }
}
