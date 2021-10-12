<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $fillable = [
        'user_id',
        'post_id',
        'date',
        'time',
        'comment',
        'created_at',
        'updated_at',

    ];
    protected $hidden = ['crated_at' , 'updated_at'];
    public $timestamps = true;
}
