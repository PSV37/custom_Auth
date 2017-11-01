@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                  @if(session()->has('msg'))
                    <div class="alert alert-success ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                          {{session()->get('msg')}}
                        </div>

                    @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('reset') }}">
                        {{ csrf_field() }}
                       <input type="hidden" name="verifyToken" value="{{$verifyToken}}">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cpassword') ? ' has-error' : '' }}">
                            <label for="cpassword" class="col-md-4 control-label">cpassword(Confirm)</label>

                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control" name="cpassword" required>

                                @if ($errors->has('cpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Set Password
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
