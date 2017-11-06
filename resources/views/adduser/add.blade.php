@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	     @include('layouts.sidebar')
	  <div class="col-md-9 col-lg-9 col-sm-9">
		   <div>
		      <h2>Add New User :</h2>
			        @if(session()->has('msg'))
			        <div class="alert alert-success">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			                    ×</button>
			              {{session()->get('msg')}}
			            </div>

		            @endif
		   </div>

		   <div>
			   	<form  class="form-horizontal" method="POST" action="{{ url('add/user') }}">
			   		{{ csrf_field() }}
						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=uname>Username</label>
								<input type="text" name="uname" class="form-control" placeholder="Username" required>
								@if ($errors->has('uname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uname') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="col-md-6 col-lg-6">
								<label for=fname>firstname</label>
								<input type="text" name="fname" class="form-control" placeholder="firstname" required>
								 @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=lname>lastname</label>
								<input type="text" name="lname" class="form-control" placeholder="lastname" required>
								 @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="col-md-6 col-lg-6">
								<label for=gender>gender</label>
								<select name="gender" class="form-control">
									<option value="">select gender</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
								 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=role_id>Select Role</label>
								 <select name='role_id' class="form-control">
	                                    <option value="">select role</option>
	                                    <option value="1">Admin</option>
	                                    <option value="2">User</option>
	                                    <option value="3">Client</option>
	                                    <option value="4">Employee</option>
	                             </select>
	                              @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif


							</div>
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=email>Email</label>
								<input type="text" name="email" class="form-control" placeholder="Email" required>
								 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							
						</div>
				

						<div class="form-group">
							<div class="col-md-6 ">
								<button type="submit" class="btn btn-primary">
								    New User
								</button>
							</div>
						</div>
	   		
			   	</form>
		   </div>
	      
		  </div>

		  
  
</div>
</div>


@endsection
