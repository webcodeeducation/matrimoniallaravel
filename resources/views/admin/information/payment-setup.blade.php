@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Payment Setup</h3></div>
	<div class="panel-body">


<div class="row">
                            <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Payment Gateway</h3>
                        </div><!-- /.box-header -->

                        <div class="flash-message">
						  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
						    @if(Session::has('alert-' . $msg))
						    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
						    @endif
						  @endforeach
						</div>

                        <form id="form1" action="paymentsetup" name="employeeform" method="post" accept-charset="utf-8">
                        	{{csrf_field()}}
                            <div class="box-body">
                                                                                                <input type="hidden" name="ci_csrf_token" value="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Income Head</label><small class="req"> *</small>

                                    <select autofocus="" id="inc_head_id" name="income_head" class="form-control" autocomplete="off">
                                        <option value="">Select</option>
                                                                                    <option value="1">Stripe</option>

                                                                                        <option value="2">Razorpay</option>

                                                                                        

                                                                                        <option value="3">Paypal</option>

                                                                                       

                                                                                </select><span class="text-danger"></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name<small class="req"> *</small></label>
                                    <input id="name" name="name" placeholder="" type="text" class="form-control" value="">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Api Key</label>
                                    <input id="invoice_no" name="api_key" placeholder="" type="text" class="form-control" value="">
                                    <span class="text-danger"></span>
                                </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Api Secret</label>
                                    <input id="invoice_no" name="api_secret" placeholder="" type="text" class="form-control" value="">
                                    <span class="text-danger"></span>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3"></textarea>
                                    <span class="text-danger"></span>
                                </div>

                                <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-left">Save</button>
                            </div>
                        </form>
                            </div><!-- /.box-body -->

                            
                    

                </div><!--/.col (right) -->
                <!-- left column -->
                        <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> Gateway List</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                       
                        <div class="table-responsive mailbox-messages">
                                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

                                 
                                 <table class="table table-striped table-bordered table-hover income-list dataTable no-footer" data-export-title="Income List" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 889px;">
                                <thead>
                                    <tr role="row">
                                    	<th>Name</th>
                                    	<th>Description</th>
                                    	<th>Api Key</th>
                                    	<th>Api Secret</th>
                                    	
                                    	<th>Action</th></tr>
                                </thead>
                                <tbody>
                                	@foreach($payments as $key=>$value)
                                <tr role="row" class="odd">
                                	<td>
                                	{{$value->name}}</td><td>{{$value->description}}</td><td>{{$value->api_key}}</td><td>{{$value->api_secret}}</td><td class=" dt-body-right"><button class="btn btn-primary">Active</button>&nbsp;<button class="btn btn-danger">Delete</button></td></tr>
                                	@endforeach
                            </tbody>
                            </table>
                        </div><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>

		
		
	</div>
</div>
@endsection