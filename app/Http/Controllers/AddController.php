<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\AddUser;
use Mail;
use DB;
use Hash;
use App\Mail\verifyEmail;


class AddController extends Controller
{
		/************* Display Create User *************/
		public function create()
		{
		  return view('adduser.add');
		}

		/*************  Add User *************/
		public function adduser(Request $request)
		{

			$this->validate($request, [
				'uname' => 'required',
				'lname' => 'required',
				'gender' => 'required',
				'role_id' => 'required',
				'email' => 'required',
			]);

			if($request->gender == 'male')
			{
			  $img_path = 'boy_logo.png';
			}
			else
			{
			  $img_path = 'girl_logo.png';
			}

			$user = new User;
			$user->username = $request->uname;
			$user->firstname = $request->fname;
			$user->lastname = $request->lname;
			$user->gender = $request->gender;
			$user->role_id = $request->role_id;
			$user->email = $request->email;
			$user->status = 0;
			$user->verifyToken = Str::random(40);
			$user->image =  $img_path ;
			$user->save();

			$thisuser = User::findOrFail($user->id);
			$this->sendmail($thisuser);

			session()->flash('msg','Added New User sucessfully And Check Your Mail To Set Password');
			return redirect ('create/user');
		}

		/*************  Send Email To Added User *************/
		public function sendmail($thisuser)
		{
		    Mail::to($thisuser['email'])->send(new verifyEmail($thisuser));
		}

		/************* After Set Password From User Email *************/
		public function sendEmailDone($email,$verifyToken)
		{
			$verifyToken = $verifyToken;
			return view('email.resetpassword',compact('verifyToken'));
		}

		/************* Set User Password *************/
		public function setpassword(Request $request)
		{ 
			$this->validate($request , [
			    'password' =>'required',
			]);

			$verifytoken = $request->verifyToken;
			$reset_pass = new User;
			$reset_pass->password  = Hash::make($request->password);
			$reset_user_pass = DB::table('users')->where('verifyToken',$verifytoken)
			                               ->update(['password'=>$reset_pass->password ,'verifyToken'=>'']);

			if($reset_user_pass)
			{
				session()->flash('msg',' Password Updated sucessfully');
				return back();
			}

	    }

		/************* Display List  Of Added User *************/
		public function userlist(Request $request)
		{
			$addedusers = DB::table('users')->where('status',0)->get();
			return view('adduser.list',compact('addedusers'));
		}

		/************* Display Edit View For Added User *************/
		public function addeduseredit($id)
		{
			$obj_user_data = User::find($id);
			return view('adduser.edit',compact('obj_user_data'));
		}

		/************* Update Added User Data *************/
		public function userupdate(Request $request)
		{
			$uid = $request->id;

			$this->validate($request, [
				'uname' => 'required',
				'lname' => 'required',
				'gender' => 'required',
				'role_id' => 'required',
			]);

			if($request->gender == 'male')
			{
				$img_path = 'boy_logo.png';
			}
			else
			{
				$img_path = 'girl_logo.png';
			}

			$user =  User::find($uid);
			$user->username = $request->uname;
			$user->firstname = $request->fname;
			$user->lastname = $request->lname;
			$user->gender = $request->gender;
			$user->role_id = $request->role_id;
			$user->image =  $img_path ;
			$user->save();
			session()->flash('msg','Existing User updated sucessfully');
			return redirect ('userlist');
		}

		/************* Delete Added User Data *************/
		public function userdelete($id)
		{
			$obj_user_delete = User::find($id);
			$obj_user_delete->delete($id);
			session()->flash('msg','Existing User Deleted sucessfully');
			return redirect ('userlist');
		}
}
