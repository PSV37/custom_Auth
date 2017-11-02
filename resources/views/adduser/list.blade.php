@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-2 col-lg-2">
  </div>
  <div class="col-md-8 col-lg-8 col-sm-12">
   <div>
      <h2>Added User :</h2>
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
    @isset($addedusers)
    @foreach($addedusers as $user)
    <tr>
      <th scope="row"><a href="{{url('adduser/image/'.$user->id)}}"><img src="{{url('../')}}/images/{{$user->image}}" height="50px" class="img-rounded add_user_img"></a></th>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->gender}}</td>
      <td>{{$user->role_id}}</td>
      <td><a href="{{url('adduser/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
      <td><a href="{{url('adduser/'.$user->id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are You Sure Deleted..')">Delete</a></td>
    </tr>
    @endforeach
    @endisset
    <tr>
      <td><b style="color: red">No User Added</b></td>
    </tr>
  </tbody>
</table>
  </div>
  <div class="col-md-2 col-lg-2">
  </div>
  
</div>

@endsection
