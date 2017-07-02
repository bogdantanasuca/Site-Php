@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"><h3>Recipes </h3></div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                    <div class="panel-body">
                      <div class="form-group">
                      <input type="text" class="form-control" id="search"  name="search" placeholder="Search for..."></input>
                    </div>
                  </div>
                          <thead> 
                              <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Time to cook</td>
                            <td>Yield</td>
                            <td>Rating</td>
                            <td>User</td>
                        </tr>

    </thead>
    <tbody>
      @foreach($data as $value)
                            <tr>
                              <td><a href="/recipes/{{ $value->Name }}">{{ $value->Name }}</a></td>
                              <td>{{ $value->Description }}</td>
                              <td>{{ $value->Time_to_cook }}</td>
                              <td>{{ $value->Yield }}</td>
                              <td>{{ $value->rating }}/5</td>
                              <td ><a href="/users/{{ $value->User }}">{{ $value->User }}</a></td>
                            </tr>
                          @endforeach
    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
<script type="text/javascript">
$(function(){
 $('#search').keyup(function(){
            $value = $(this).val();
            $.ajax({
                type    : 'get',
                url     : '{{URL::to('search')}}',
                data    : {'search':$value},
                success: function(data){
                    $('tbody').html(data);
                }
            });
        });
});

</script>
@endsection