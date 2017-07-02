@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading"><font size="6"><b>{{ $characters['name'] }} </b></font><font size="3"><b> Rating:{{ $characters['rating'] }}/5 </b></font>
                                  @if (Auth::check())
                                    @if(Auth::user()->name === $user)
                                        <button class="btn btn-primary" onclick="window.location.href='/recipes/{{ $characters['name'] }}/edit'">Edit</button>
                                    @endif
                                  @endif
                  <p align="right">Uploaded by <a href="/users/{{ $user }}">{{ $user }}</a></p>
                  <p align="right">{{ $characters['rating_count'] }} Reviews</p>
                </div>
                                   
                      <!-- Table -->
                      <table class="table">
                            <tr>
                              <td><font size="3"><b>Description</b></font></td>
                            </tr>
                            <tr>
                              <td>{{ $characters['description'] }}</td> 
                            </tr>
                            <tr>
                              <td><font size="3"><b>Yield</b></font></td>
                            </tr>
                            <tr>
                              <td>{{ $characters['yield'] }}</td>
                            </tr>
                            <tr>
                              <td><font size="3"><b>Ingredients</b></font></td>
                            </tr>
                            <tr>
                              <td>{{ $characters['ingredients'] }}</td> 
                            </tr>
                            <tr>
                              <td><font size="3"><b>Time to cook</b></font></td>
                            </tr>
                            <tr>
                              <td>{{ $characters['time_to_cook'] }}</td>
                            </tr>
                            <tr>
                              <td><font size="3"><b>Recipe</b></font></td>
                            </tr>
                            <tr>
                              <td>{{ $characters['recipe'] }}</td>
                            </tr>
                      </table>
            </div>
            <h3>Comments</h3>
            <button id="myBtn">Add comment</button>
            <hr>
            @foreach($comments as $values)
      <div class="panel panel-warning">
                                    @if($values->user_name === 'Anonymous')
                                        <div class="panel-heading">{{$values->user_name}} rated this recipe with {{ $values->rating }}/5 and said:</div>
                                        @else
                                          <div class="panel-heading"><a href="/users/{{ $values->user_name }}">{{ $values->user_name }}</a> rated this recipe with {{ $values->rating }}/5 and said:</div>
                                    @endif
          <div class="panel-body">"{{ $values->comment }}"</div>
    </div>
                          @endforeach
        </div>
    </div>
</div>
@extends('test')





@endsection
