<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'table_posts';
    protected $dateFormat = 'U';
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'author', 'username');
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment", "id_post", "id");
    }
}
