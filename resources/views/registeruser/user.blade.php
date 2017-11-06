@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    @include('layouts.sidebar')
  <div class="col-md-9 col-lg-9 col-sm-9">
   <div>
      <h2>Registred User :</h2>
      @if(session()->has('msg'))
        <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
              {{session()->get('msg')}}
            </div>

      @endif
   </div>
      <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>User Profile</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Gender</th>
      <th>Role</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allusers as $user)
    <tr>
      <th scope="row"><img src="{{url('../')}}/images/{{$user->image}}" height="50px"></th>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->gender}}</td>
      <td>{{$user->role_id}}</td>
      <td><a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
      <td><a href="{{url('user/'.$user->id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are You Sure Deleted..')">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>  
</div>

@endsection
