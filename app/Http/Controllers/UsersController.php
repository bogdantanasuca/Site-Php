<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Recipe;

use Auth;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::all();

        return View::make('users.index', compact('users'));
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
            $users = DB::select('select * from users where name = ?',[$id]);
      return view('update',['users'=>$users]);
    }

    function getdata($sal)
    {
        
        $table = DB::table('users')->where('name', $sal)->first();
        $users = DB::select('select * from users');

        $characters = [
            'name'=>$table->name,
            'date'=>$table->created_at,
            'email'=>$table->email
        ];
        $user =$table->name;
        $retete = Recipe::where('User',$sal )
               ->get();
   
            return view('my_acount', compact('characters','users','user','retete'));
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
        $email = $request->input('email');

        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email'
        ];

        $input = Input::only(
            'name',
            'email'
        );
        $messages = array(
        'email' => 'The :attribute is really really really important.'
    );
        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return Redirect::back()->withErrors($validator);
        }
      DB::update('update users set name = ? where name = ?',[$name,$id]);
      DB::update('update users set email = ? where name = ?',[$email,$id]);
      DB::update('update recipes set User = ? where User = ?',[$name,$id]);
      return Redirect::to("/users/".$name);
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
