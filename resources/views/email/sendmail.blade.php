<h1>Thank you {{$user->username}} for registration with us</h1>
<div>
	<h2>You Need To Forgot Your Password So <a href="{{url('sendEmailDone',['email'=>$user->email,'verifyToken'=>$user->verifyToken])}}">Click Here</a></h2>
</div>