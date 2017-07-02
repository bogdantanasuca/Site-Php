<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    protected $fillable =['Name','Description','Ingredients','Time_to_cook','recipe','Yield','User'
    ];
}
