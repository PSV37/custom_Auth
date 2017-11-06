<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <style type="text/css">
     .alet 
        background-color: #3c763d;
        border-color: #d6e9c6;
        color: wheat;
      }
      .add_user_img
      {
        height: 50px;
      }
      .nav_bar li
      {
        list-style-type:none;
      }
      .nav_bar li a
      {
        float: left;
        display: block;
        text-decoration: none;
        margin-top: -8px;
        color: saddlebrown;
        margin-left: -191px;
      }
      .nav_menu
      {
        font-size: 27px;
      }

      .navbar-nav li .form-control
      {
        width: 256%;
        margin-left: 213%;
        margin-top: 10px;
      }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="nav_bar">
                        @if(!Auth::check())
                           <spna class="nav_menu"> {{ config('app.name', 'Laravel') }} </spna>
                         @elseif(Auth::check() && Auth::user()->role_id == 1)
                             <li><a href="{{ url('/home') }}"><h3><b>Admin</b></h3></a></li>
                         @else
                              <li><a href="{{ url('/home') }}"><h3><b>{{Session::get('username')}} : @if(Session::get('orgnization_name')){{Session::get('orgnization_name')}} @endif</b></h3></a></li>
                         @endif
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav col-sm-offset-2">
                           <!-- Display Orgnization List -->
                          <li> 
                             @if(Auth::check() && Auth::user()->id)
                                <select name="org" id="org" class="form-control">
                                    <option value="">Orgnization List</option>                           
                                  @if(Auth::check() && Auth::user()->role_id == 1)
                                       @foreach (Session::get('all_user_org') as $allorg)
                                         <option value="0">{{$allorg->org_name}}</option>        
                                       @endforeach  
                                        <input type="hidden" name="url" id="url" value="{{url('change/orgnization')}}">
                                    @else
                                       @foreach (Session::get('user_org_data') as $org)
                                          <option value="{{$org->org_id}}"> {{$org->org_name}}</option>            
                                       @endforeach 
                                        <input type="hidden" name="url" id="url" value="{{url('change/orgnization')}}">  
                                    @endif
                                </select>
                            
                           @endif
                          </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <img src="{{url('../')}}/images/{{Auth::user()->image}}" height="30px" class="img-circle">   {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('adduser/image/') }}/{{Auth::user()->id}}">User Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
       $(document).ready(function(){
        $('#org').on('change',function(){

          var org_id = $(this).val();
          var url = $('#url').val();
    var token = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type:'post',
            url: url,
            data : {"org_id" : org_id ,  "_token": token},
            success:function(data){
              location.reload();
                alert('successfully changed');

            }

          });
        });
       });
    </script>

</body>
</html>
