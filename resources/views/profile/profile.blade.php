@extends('layouts.app')

@section('content')

<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{url('../')}}/images/{{$user_obj->image}}" alt="Profile image example"/>
    
        <div class="fb-profile-text">
            <h1>{{$user_obj->firstname}}  {{$user_obj->lastname}}</h1>
            <p>Joined : {{$user_obj->created_at->format('d/m/y')}} </p>
            <p>Last Login : {{$user_obj->created_at->diffForHumans()}} </p>
        </div>
    </div>
</div> <!-- /container --> 
<div class="container">
	@if( $user_obj !=Auth::user())
	<button class="btn btn-primary change " >Change Profile</button>
        <form action="{{url('image/upload')}}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        	<input type="file" name="file" class="upload" style="display: none">
        	<button type="submit" class="btn btn-primary upload" style="display: none;">Upload</button>
        </form>
        @endif
</div>


@endsection


 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
         $('.change').on('click',function(){
              $('.change').hide();
               $('.upload').show();
         });
    	});
    </script>