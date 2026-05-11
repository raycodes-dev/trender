<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class our_work extends Model
{
    protected $fillable = [
        'name',
        'video_link',
        'video_path',
        'image',
        'type', // if you're using the project type category
    ];
//    protected $casts = [
//        'video_path' => 'string', // Forces it to stay a string
//
//        'image' => 'string',
//    ];
}
