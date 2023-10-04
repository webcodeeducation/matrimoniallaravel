@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Religions</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Add Religion</h4></div>
					<div class="panel-body">
						<form action="admin/addreligion" method="POST">
							{{csrf_field()}}
							<table class="table table-stripped">
								<tr>
									<td>Religion name</td>
				          			<td><input type="text" class="form-control" name="name"></td>
								</tr>
								<tr>
									<td></td>
									<td><input class="btn btn-success" type="submit" value="Add"><br><br></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
<div class="panel panel-default">
					<div class="panel-heading"><h4>Religion list</h4></div>
					<div class="panel-body">
						<form method="POST">
							<table class="table table-stripped">
								<tr>
									<th>Name</th>
									<th>Action</th>
								</tr>
								@forelse($religions as $religion)
									<tr>
										<td>{{$religion->name}}</td>
										<td><a href="{{route('information.updateMusic', [$religion->id])}}">Update</a> | <a href="#">Delete</a></td>
									</tr>
								@empty
									<tr>
										<td>No</td>
										<td>Music</td>
									</tr>
								@endforelse
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-12">
				
			</div>
		</div>
	</div>
</div>
@endsection