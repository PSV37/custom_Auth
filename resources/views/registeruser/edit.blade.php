@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
      
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('registerupdate') }}">
                        {{ csrf_field() }}
                         <input  type="hidden" class="form-control" name="id" value="{{ $obj_user_data->id }}" >

                          <div class="form-group{{ $errors->has('uname') ? ' has-error' : '' }}">
                            <label for="uname" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="uname" type="text" class="form-control" name="uname" value="{{ $obj_user_data->username }}" required autofocus>

                                @if ($errors->has('uname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-4 control-label">Firstname</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ $obj_user_data->firstname }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Lastname</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ $obj_user_data->lastname }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $obj_user_data->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 

                          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">select gender</label>

                            <div class="col-md-6">
                                 <select name='gender' class="form-control">
                                    <option value="">select gender</option>
                                    <option value="male" @if($obj_user_data->gender == 'male'){{'selected'}} @endif>Male</option>
                                    <option value="female"  @if($obj_user_data->gender == 'female'){{'selected'}} @endif>Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-4 control-label">role</label>

                            <div class="col-md-6">
                                <select name='role_id' class="form-control">
                                    <option value="">select role</option>
                                    <option value="1"  @if($obj_user_data->role_id == 1){{'selected'}} @endif>Admin</option>
                                    <option value="2" @if($obj_user_data->role_id == 2){{'selected'}} @endif>User</option>
                                    <option value="3" @if($obj_user_data->role_id == 3){{'selected'}} @endif> Client</option>
                                    <option value="4" @if($obj_user_data->role_id == 4){{'selected'}} @endif>Employee</option>
                                </select>

                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
