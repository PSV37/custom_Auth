@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-8 col-lg-8 col-sm-9 ">

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                @if(Session::get('orgnization_name'))
                     this is {{Session::get('orgnization_name')}}


                @else
                <!-- you can perform two way -->
                   <!-- first -->
                @if(Session::get('org_name'))
                    You are orgnization is    {{Session::get('org_name')}}             
                @endif    
                     <!-- second -->
                @if(!Session::has('org_name'))
                  You are logged in!                                
                @endif

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
