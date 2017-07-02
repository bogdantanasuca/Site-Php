<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\recipes;

use Illuminate\Support\Facades\Input;

use Auth;

use DB;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("upload");
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
        $user = new recipes;
        $user->name = Input::get("name");
        $user->description = Input::get("description");
        $user->ingredients = Input::get("ingredients");
        $user->Time_to_cook = Input::get("Time_to_cook");
        $user->recipe = Input::get("recipe");
        $user->Yield = Input::get("Yield");
        $user->User = Auth::user()->name;
        $user->user_id = Auth::user()->id;
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::select('recipes');

        return view('browse', ['browse' => $users]);
    }

    function getdata()
    {
        $data['data'] = DB::table('recipes')->get();

            return view('browse',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function products(){
    $data['data'] = DB::table('recipes')->get();

            return view('browse',$data);
 }
    public function search(Request $request){
     if($request->ajax())
     {
        $output='';
        $customers=DB::table('recipes')->where('Name','LIKE','%'.$request->search.'%')->get();
        if($customers)
        {foreach ($customers as  $value) {
                $output.=   '<tr>'.
                              '<td><a href="/recipes/">'.$value->Name.'</a></td>'.
                              '<td>'.$value->Description .'</td>'.
                              '<td>'.$value->Time_to_cook .'</td>'.
                              '<td>'.$value->Yield.'</td>'.
                              '<td>'.$value->rating.'</td>'.
                              '<td ><a href="/users/ + {{$value->User}}">'.$value->User.'</a></td>'.
                            '</tr>';
        }
        }
        return Response($output);  
     }}
}
