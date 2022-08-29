<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'post_tags', 'post_id', 'tag_id');
    }
    public function likes(){
        return $this->belongsToMany( 'App\Models\User', 'likes', 'post_id', 'user_id');    }
}
