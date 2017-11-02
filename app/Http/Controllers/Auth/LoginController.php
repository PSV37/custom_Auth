<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
     public function showLoginForm()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
       
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

       
       
            $user_login = new User;
            $user_login->email = $request->email;
            $user_login->password = $request->password;


           if (Auth::attempt(['email' => $user_login->email, 'password' =>  $user_login->password]))
           {
           
               $user_org = DB::table('orgnizations as o')->Join('users as u','u.id','=','o.user_id')->Join('roles as r','r.id','=','u.role_id')
                                                         ->select('o.id','u.firstname as u_firstname','u.id','o.name as org_name','o.firstname as fname','o.lastname as lname','u.username as u_name','o.logo2','o.email_first as f_email','o.logo1','r.role_name','r.id','u.role_id')->get();
             
                  if(isset($user_org) && !empty($user_org))
                  {
                    //session(['org_name' => $user_org[0]->name]);
                    Session::put('org_name', $user_org[0]->org_name);
                    Session::put('username', $user_org[0]->u_firstname);
                    Session::put('logo1', $user_org[0]->logo1);
                    Session::put('logo2', $user_org[0]->logo2);
                    Session::put('u_name', $user_org[0]->u_name);
                    Session::put('u_role', $user_org[0]->role_name);
                    
                    return redirect('/home');
                  }                      

            } 
            else
            {
                 throw ValidationException::withMessages([
                                'email' => [trans('auth.failed')],
                         ]);
                return redirect('login');
            }
/*
            $login = DB::table('users')->where(['email'=>$user_login->email,'password'=>$user_login->password])->get();
            return $login;
            exit;
            if($login)
            {
                echo "good";
            }
            else
            {
                echo "bad";
            }*/
 
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function logout()
    {
         Auth::logout();
         return redirect('/register');
    }
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/
}
