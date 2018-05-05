<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts()
    {
        return $this->belongsToMany('App\Post','posts_has_categories','categories_id','posts_id');
    }
}
