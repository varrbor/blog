<?php
/**
 * Created by PhpStorm.
 * User: varrbor
 * Date: 04.05.18
 * Time: 23:20
 */

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function showAll()
    {
        return view('home');
    }
}