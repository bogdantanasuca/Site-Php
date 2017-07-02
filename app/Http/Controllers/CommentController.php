<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\reviews;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Auth;

use DB;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $user = new reviews;
        $user->recipe_id = $id;
        $user->user_name = "Anonymous";       
        if (Auth::check())
        $user->user_name = Auth::user()->name;
        $user->rating = Input::get("rating");
        $user->comment = Input::get("comment");
        $user->save();
		$retete = reviews::where('recipe_id',$id )
               	->get();
        $count=0;
        $ratings=0;
        foreach ($retete as $key) {
        	$count=$count+1;
        	$ratings=$ratings+$key->rating;
        }
        $final_rating=$ratings/$count;

        
		DB::update('update recipes set rating = ? where ID = ?',[$final_rating,$id]);
		DB::update('update recipes set rating_count = ? where ID = ?',[$count,$id]);

        $table = DB::table('recipes')->where('ID', $id)->first();
        return Redirect::to("/recipes/".$table->Name);
    }
}
