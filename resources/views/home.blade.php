@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  {{ Session::get('org_name') }}
                  {{Session::get('username')}}
                  {{Session::get('logo1')}}
                  {{Session::get('logo2')}}
                  {{Session::get('u_name')}}
                  {{Session::get('u_role')}}


                  @if(!Session::has('org_name'))
                    You are logged in!
                
                @else
              
               You are in else filed!
                
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
