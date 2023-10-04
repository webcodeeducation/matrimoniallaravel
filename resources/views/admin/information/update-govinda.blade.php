<form action="/admin/addstudent" method="post">
  <div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="">
  </div>
  <div class="form-group">
    <label for="pwd">City:</label>
    <input type="text" class="form-control" id="city" name="city" value="">
  </div>
    <div class="form-group">
    <label for="pwd">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" value="">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- @extends('layouts.admin')

@section('content')





<div class="container">
  <h1>Students Data</h1>
  <div class="row">
    <div class="col-sm-4">
      <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
      <form action="/admin/addstudent" method="post">
  {{csrf_field()}}
  <div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="">
  </div>
  <div class="form-group">
    <label for="pwd">City:</label>
    <input type="text" class="form-control" id="city" name="city" value="">
  </div>
    <div class="form-group">
    <label for="pwd">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" value="">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <div class="col-sm-8">
      <table class="table table-bordered">
        <tr>
        <td>1</td>
      </tr>
      @foreach($students as $key=>$value)
      <tr>
        <td>
          hii
        </td>
      </tr>
      @endforeach
    </table>
    </div>
  </div>
</div>










@endsection -->