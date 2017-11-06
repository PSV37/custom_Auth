@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	   @include('layouts.sidebar')

	  <div class="col-md-8 col-lg-8 col-sm-12">
		   <div>
		      <h2>{{{ isset($org_user) ? 'Update' : 'Create' }}} Orgnization :</h2>
			        @if(session()->has('msg'))
			        <div class="alert alert-success">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			                    ×</button>
			              {{session()->get('msg')}}
			            </div>

		            @endif
		   </div>

		   <div>
			   	<form  class="form-horizontal" method="POST" action="{{ url(isset($org_user) ? 'update/orgnization' : 'add/orgnization' ) }}" enctype="multipart/form-data">
			   		{{ csrf_field() }}
			   		<input type="hidden" name="org_id" value="{{{ isset($org_user) ? $org_user->id : '' }}}" >
						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=name>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Username" value="{{{ isset($org_user) ? $org_user->name : '' }}}" required>
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="col-md-6 col-lg-6">
								<label for=web>WebAddress</label>
								<input type="text" name="web" class="form-control" id="web" placeholder="firstname" value="{{{ isset($org_user) ? $org_user->webaddress : '' }}}" required>
								 @if ($errors->has('web'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=phone>Phoneno</label>
								<input type="text" name="phone" class="form-control" id="phone" placeholder="lastname" value="{{{ isset($org_user) ? $org_user->phoneno : '' }}}" required>
								 @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="col-md-6 col-lg-6">
								<label for=address>Address</label>
								<input type="text" name="address" class="form-control" placeholder="lastname" value="{{{ isset($org_user) ? $org_user->address : '' }}}" required>
								 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=femail>Email</label>
								 <input type="email" name="femail" class="form-control" id="femail" placeholder="lastname" value="{{{ isset($org_user) ? $org_user->email_first : '' }}}" required>
	                              @if ($errors->has('femail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('femail') }}</strong>
                                    </span>
                                @endif


							</div>
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=status>Status</label>
								<select name="status" id="status" class="form-control">
									<option value="">select status</option>
									<option value="active" >Active</option>
									<option value="inactive" >Inactive</option>
								</select>
								 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=logo1>Logo1</label>
								 <input type="file" name="logo1" class="form-control" >
                              <img src="{{url('orgnization')}}/{{{ isset($org_user) ? $org_user->logo1 : 'organization.png' }}}" height="50px" width="200px">

	                              @if ($errors->has('logo1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo1') }}</strong>
                                    </span>
                                @endif
                       

							</div>
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=logo2>logo2</label>
								<input type="file" name="logo2" class="form-control">
								 <img src="{{url('orgnization')}}/{{{ isset($org_user) ? $org_user->logo2 : 'organization_old.png' }}}" height="70px">
								 @if ($errors->has('logo2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo2') }}</strong>
                                    </span>
                                @endif
							</div>
							
						</div>


						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=fname>FirstName</label>
								 <input type="text" name="fname" class="form-control" placeholder="First Name" value="{{{ isset($org_user) ? $org_user->firstname : '' }}}"  required>
	                              @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif


							</div>
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=lname>LastName</label>
								<input type="text" name="lname" class="form-control" placeholder="Last Name" value="{{{ isset($org_user) ? $org_user->lastname : '' }}}" required>
								 @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=email_second>Email2</label>
								 <input type="email" name="email_second" class="form-control" placeholder="Email" value="{{{ isset($org_user) ? $org_user->email_second : '' }}}" required>
	                              @if ($errors->has('email_second'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_second') }}</strong>
                                    </span>
                                @endif


							</div>
							<div class="col-md-6 col-lg-6 col-sm-12">
								<label for=mobileno>Mobileno</label>
								<input type="text" name="mobileno" class="form-control" placeholder="Mobileno" value="{{{ isset($org_user) ? $org_user->mobileno : '' }}}" required>
								 @if ($errors->has('mobileno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobileno') }}</strong>
                                    </span>
                                @endif
							</div>
							
						</div>
				

						<div class="form-group">
							<div class="col-md-6 ">
								<button type="submit" class="btn btn-primary">
								    {{{ isset($org_user) ? 'update': 'create' }}} Orgnization
								</button>
							</div>
						</div>
	   		
			   	</form>
		   </div>
		  </div>
</div>
</div>


@endsection
