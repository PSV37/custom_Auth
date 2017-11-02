@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-1 col-lg-1">
  </div>
  <div class="col-md-10 col-lg-10 col-sm-12">
   <div>
      <h2>Orgnization List :</h2>
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
      <th>name</th>
      <th>webaddress</th>
      <th>phoneno</th>
      <th>address</th>
      <th>email_first</th>
      <th>logo1</th>
      <th>logo2</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    @if(@isset($org_user_obj))
    @foreach($org_user_obj as $userorg)
    <tr>
      
      <td>{{$userorg->name}}</td>
      <td>{{$userorg->webaddress}}</td>
      <td>{{$userorg->phoneno}}</td>
      <td>{{$userorg->address}}</td>
      <td>{{$userorg->femail}}</td>
      <td>  <img src="{{url('../')}}/orgnization/{{$userorg->logo1}}" height="50px"></td>
      <td> <img src="{{url('orgnization')}}/{{$userorg->logo2}}" height="50px"></td>
      <td>{{$userorg->firstname}}</td>
      <td>{{$userorg->lastname}}</td>
      <td><a href="{{url('orgnization/'.$userorg->org_id.'/edit')}}" class="btn btn-primary">Edit</a></td>
      <td><a href="{{url('orgnization/'.$userorg->org_id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are You Sure Deleted..')">Delete</a></td>
    </tr>
    @endforeach
    @else
    <tr>
      <td><b style="color: red">No User Added</b></td>
    </tr>
    @endif
  </tbody>
</table>
  </div>
  <div class="col-md-1 col-lg-1">
  </div>
  
</div>

@endsection
