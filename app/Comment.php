<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function posts()
    {
        return $this->belongsTo('App\Post','posts_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','users_id');
    }
}
