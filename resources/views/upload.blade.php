@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"> </div>
                    <br></br>
                    @if(Auth::check())
                      <form class="form-horizontal" role="form" method="POST" action="store">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name of the recipe</label>

                            <div class="col-md-6">
                                <input class="form-control" name="name" id="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" cols="40" rows="3" id="description" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ingredients') ? ' has-error' : '' }}">
                            <label for="ingredients" class="col-md-4 control-label">Ingredients</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="ingredients" id="ingredients" value="{{ old('ingredients') }}" required autofocus></textarea>

                                @if ($errors->has('ingredients'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ingredients') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('Time_to_cook') ? ' has-error' : '' }}">
                            <label for="Time_to_cook" class="col-md-4 control-label">Time to cook</label>

                            <div class="col-md-6">
                                <input class="form-control" name="Time_to_cook" id="Time_to_cook" value="{{ old('Time_to_cook') }}" required autofocus>

                                @if ($errors->has('Time_to_cook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Time_to_cook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Yield') ? ' has-error' : '' }}">
                            <label for="Yield" class="col-md-4 control-label">Yield</label>

                            <div class="col-md-6">
                                <input class="form-control" name="Yield" id="Yield" value="{{ old('Yield') }}" required autofocus>

                                @if ($errors->has('Yield'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Yield') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('recipe') ? ' has-error' : '' }}">
                            <label for="recipe" class="col-md-4 control-label">The recipe</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="recipe" id="recipe" value="{{ old('recipe') }}" required autofocus></textarea>

                                @if ($errors->has('recipe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('recipe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>

                            </div>
                        </div>
                    </form>
                    @endif
                    <div class="panel-heading"> </div>
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see this section >></a>
            @endif
        </div>
    </div>
</div>
@endsection
