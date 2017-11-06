
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<div class="col-md-3 col-lg-3 col-sm-3 " style="width: 220px">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Sidebar</h4>
		</div>
		<div class="panel-body">
			  <ul class="nav navbar-nav nav_div">
                        @if(Auth::check() && Auth::user()->role_id == 1)
                             <li><a href="{{ route('registeruser') }}">Registred User</a></li>
                             <li><a href="{{ route('createuser') }}">New User</a></li>
                             <li><a href="{{route('create')}}">Create Orgnization</a></li>
                         @endif
                         @if(Auth::check() && Auth::user()->id)
                             <li><a href="{{route('userlist')}}">Added User List</a></li>             
                             <li><a href="{{route('list')}}">Orgnization List</a></li>
                         @endif    
              </ul>           
		</div>
	</div>
</div>