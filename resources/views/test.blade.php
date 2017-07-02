<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 align="center">Add comment</h2>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="add_comment/{{ $characters['id'] }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="col-md-4 control-label">Rate this recipe</label>
                            <div class="col-xs-2" style="width: 10.99%">

                                  <select class="form-control" name="rating" id="rating" value="{{ old('rating') }}" required autofocus>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>


                                @if ($errors->has('rating'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-4 control-label">Comment</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="comment" cols="40" rows="3" id="comment" value="{{ old('comment') }}" required autofocus></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
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
    </div>
    <div class="modal-footer">
      <h3> </h3>
    </div>
  </div>

</div>


<!--><div id="myModal1" class="modal"><-->

  <!-- Modal content -->
  <!--><div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 align="center">Add comment</h2>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="store">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Your name</label>

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
                            <label for="description" class="col-md-4 control-label">Comment</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" cols="40" rows="3" id="description" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
    </div>
    <div class="modal-footer">
      <h3> </h3>
    </div>
  </div>

</div>