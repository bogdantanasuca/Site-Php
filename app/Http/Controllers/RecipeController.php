<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\recipes;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Auth;

use DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $users = DB::select('select * from recipes where name = ?',[$id]);
      return view('update_recipe',['users'=>$users]);
    }
    function getdata($sal)
    {
        
        $table = DB::table('recipes')->where('name', $sal)->first();
        $recipes = DB::select('select * from recipes');

        $characters = [
            'id'=>$table->ID,
            'name'=>$table->Name,
            'description'=>$table->Description,
            'ingredients'=>$table->Ingredients,
            'time_to_cook'=>$table->Time_to_cook,
            'recipe'=>$table->recipe,
            'yield'=>$table->Yield,
            'rating'=>$table->rating,
            'rating_count'=>$table->rating_count
        ];
        $user = $table->User;
        $id=DB::table('recipes')->where('name', $sal)->first()->ID;
        $comments = DB::select('select * from reviews where recipe_id = ?',[$id]);
            return view('my_recipe', compact('characters','user','recipes','comments'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        

        $name = $request->input('name');
        $description = $request->input('description');
        $ingredients = $request->input('ingredients');
        $time_to_cook = $request->input('Time_to_cook');
        $recipe = $request->input('recipe');
        $yield = $request->input('Yield');

      DB::update('update recipes set name = ? where name = ?',[$name,$id]);
      DB::update('update recipes set description = ? where name = ?',[$description,$id]);
      DB::update('update recipes set ingredients = ? where name = ?',[$ingredients,$id]);
      DB::update('update recipes set Time_to_cook = ? where name = ?',[$time_to_cook,$id]);
      DB::update('update recipes set recipe = ? where name = ?',[$recipe,$id]);
      DB::update('update recipes set Yield = ? where name = ?',[$yield,$id]);
      return Redirect::to("/recipes/".$name);
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
