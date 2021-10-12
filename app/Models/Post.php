<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = ['crated_at' , 'updated_at'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

}
