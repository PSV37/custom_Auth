@extends('layouts.app')

@section('content')
  
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'>

<div class="container">
<div class="row">
   @include('layouts.sidebar')
    <div class="col-md-9 col-lg-9 col-sm-9">
       <div class="container">
          <div class="fb-profile" style="width:90%;">
              <div >  
              <img align="left" class="fb-image-lg" src="{{ asset('images/Tulips.jpg')}}" alt="Profile image example" style="height: 250px;"/>
              </div>
              <img align="left" class="fb-image-profile thumbnail" src="{{url('../')}}/images/{{$user_obj->image}}" alt="Profile image example"/>
          
              <div class="fb-profile-text">
                  <h1>{{$user_obj->firstname}}  {{$user_obj->lastname}}</h1>
                  <p>Joined : {{$user_obj->created_at->format('d/m/y')}} </p>
                  <p>Last Login : {{$user_obj->updated_at->diffForHumans()}} </p>
              </div>
         </div>
      </div> <!-- /container --> 
      <div class="container">
             <button class="btn btn-primary change " >Change Profile</button>
              <form action="{{url('image/upload')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <input type="file" name="file" class="upload" style="display: none">
                  <button type="submit" class="btn btn-primary upload" style="display: none;">Upload</button>
              </form>
      </div>
    </div>
</div>
</div>
@endsection

 <!-- Scripts -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
         $('.change').on('click',function(){
              $('.change').hide();
               $('.upload').show();
         });
    	});
    </script>