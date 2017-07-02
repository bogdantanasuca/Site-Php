<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $table = 'reviews';
    protected $fillable =['recipe_id','user_name','rating','comment'
    ];
}
