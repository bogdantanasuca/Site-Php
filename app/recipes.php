<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    protected $table = 'recipes';
    protected $fillable =['Name','Description','Ingredients','Time_to_cook','recipe','Yield','User'
    ];
}
