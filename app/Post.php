<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','intro','title','name','content','url'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag','tags_has_posts','posts_id','tags_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','posts_has_categories','posts_id','categories_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','users_has_posts','posts_id','users_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','posts_id');
    }
}
