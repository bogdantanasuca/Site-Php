@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">User Information
                                @if (Auth::check())
                                  @if(Auth::user()->name === $user)
                                        <button class="btn btn-primary" onclick="window.location.href='/users/{{ Auth::user()->name }}/edit'">Edit</button>
                                    @endif
                                @endif</div>
                      <!-- Table -->
                      <table class="table">
                          <tr>
                              <th>Name</th>
                              <th>Join date</th>
                              <th>Email</th>
                          </tr>
                           
                            <tr>
                              <td>{{ $characters['name'] }}</td>

                              <td>{{ $characters['date'] }}</td>

                              <td>{{ $characters['email'] }}</td>
                              
                            </tr>
                          
                      </table>
            </div>


            <!--@if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see this section >></a>
            @endif-->
        </div>
    </div>
</div>
@if($retete->count()>0) 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Recipes</div>
                      <!-- Table -->
                      <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Time to cook</td>
                            <td>Yield</td>
                            <td>Rating</td>
                        </tr>
                        @foreach($retete as $values)
                            <tr>
                              <td><a href="/recipes/{{ $values->Name }}">{{ $values->Name }}</a></td>
                              <td>{{ $values->Description }}</td>
                              <td>{{ $values->Time_to_cook }}</td>
                              <td>{{ $values->Yield }}</td>
                              <td>{{ $values->rating }}</td>
                            </tr>
                          @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>

@endif
@endsection