@extends('layouts.admin')

@section('content')


<h1>{{$govinda}}</h1>

<form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


<table class="table table-bordered">
@foreach($students as $key=>$value)
	<tr>

		<td>{{$value->name}}</td><td>{{$value->city}}</td><td>{{$value->phone}}</td>
	</tr>
@endforeach

</table>



<table class="table table-bordered">
@foreach($religions as $key=>$value)
	<tr>

		<td>{{$value->name}}</td>
	</tr>
@endforeach

</table>



@endsection