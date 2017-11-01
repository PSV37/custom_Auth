<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class UserController extends Controller
{
        /************* Display List  Of Registred User *************/
        public function index()
        {
            $uid = Auth::user()->id;
            $allusers = DB::table('users')->where('users.id','!=',$uid)->where('status',1)->get();
            return view('registeruser.user',compact('allusers'));
        }

        /************* Display Edit View Of Registred User *************/
        public function registereditview($id)
        {
            $obj_user_data = User::find($id);
            return view('registeruser.edit',compact('obj_user_data'));
        }

        /************* Upadte Data Of Registred User *************/
        public function registeredit(Request $request)
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
            return redirect ('register/user');
        }


        /************* Delete Data Of Registred User *************/
        public function registerdelete($id)
        {
            $obj_user_data = User::find($id);
            $delete_user = $obj_user_data->delete($id);
            session()->flash('msg','Registred User Deleted Successfully');
            return redirect('register/user');
        }

        public function profile($id)
        {
            $user_obj = User::find($id);
            return view('profile.profile',compact('user_obj'));
        }

        public function upload(Request $request)
        {
           $uid = Auth::user()->id;
           $file = $request->file('file');
           $filename =$file->getClientOriginalName();

           $path = 'images';

           $file->move($path ,$filename);

           DB::table('users')->where('id',$uid)->update(['image'=>$filename]);
           return back();
        }
}
