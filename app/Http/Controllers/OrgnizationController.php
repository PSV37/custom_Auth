<?php

namespace App\Http\Controllers;

use App\cr;
use Illuminate\Http\Request;
use App\Orgnization;
use Auth;
use DB;
use Session;

class OrgnizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $org_user_obj = DB::table('orgnizations as o')->Join('users as u','u.id','=','o.user_id')
                                                       ->select('u.id as u_id','o.id as org_id','o.name','o.firstname','o.lastname','o.logo1','o.logo2','o.email_first as femail','o.email_second as semail','o.status','o.phoneno','o.mobileno','o.webaddress','o.address')->get();
       return view('orgnization.list',compact('org_user_obj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orgnization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request , [
                'name' => 'required',
                'web' => 'required',
                'phone' =>'required',
                'address' => 'required',
                'femail' => 'required',
                'status' =>'required',
                'logo1' => 'required',
                'logo2' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'email_second' => 'required',
                'mobileno' => 'required',
         ]);
          /**
             * Add Orgnization logo_first  
             *
             *
             * @return \App\Orgnization
         */

        $logo_first = $request->file('logo1');
        $logoname_first =  $logo_first->getClientOriginalName();
        $path = 'orgnization';
        $logo_first->move($path , $logoname_first);

        $orgnization_logo1 = $logoname_first;

         /**
             * Add Orgnization logo_second  
             *
             *
             * @return \App\Orgnization
         */

        $logo_second = $request->file('logo2');
        $logoname_second =  $logo_second->getClientOriginalName();
        $path = 'orgnization';
        $logo_second->move($path , $logoname_second);

        $orgnization_logo2 = $logoname_second;
        

        $uid = Auth::user()->id;

       $org = new Orgnization;
       $org->name = $request->name;
       $org->webaddress = $request->web;
       $org->phoneno = $request->phone;
       $org->address = $request->address;
       $org->email_first = $request->femail;
       $org->status = $request->status;
       $org->logo1 =  $orgnization_logo1;
       $org->logo2 =  $orgnization_logo2;
       $org->firstname = $request->fname;
       $org->lastname = $request->lname;
       $org->email_second = $request->email_second;
       $org->mobileno = $request->mobileno;
       $org->user_id = $uid;
       $org->save();
       session()->flash('msg','New Orgnization sucessfully');
       return redirect ('create/orgnization');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    { 
        $array_result = array();
        $org_id = $request->org_id;
        $obj_org_data = Orgnization::find($org_id);
       
        Session::put('org_id', $obj_org_data->org_id);
        Session::put('orgnization_name', $obj_org_data->name);
        Session::put('org_logo1', $obj_org_data->logo1);
        Session::put('org_logo2', $obj_org_data->logo2);

       if($obj_org_data)
       {
          $array_result['status'] = true;
          $array_result['msg'] = 'Successfully changed';
       }
       else
       {
         $array_result['status'] = false;
          $array_result['msg'] = 'Failed due to changed';
       }
        echo json_encode($array_result);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $org_user = Orgnization::find($id);
       return view('orgnization.create',compact('org_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      $this->validate($request , [
                'name' => 'required',
                'web' => 'required',
                'phone' =>'required',
                'address' => 'required',
                'femail' => 'required',
                'status' =>'required',
                'fname' => 'required',
                'lname' => 'required',
                'email_second' => 'required',
                'mobileno' => 'required',
         ]);
          /**
             * Add Orgnization logo_first  
             *
             *
             * @return \App\Orgnization
            */
                $logo_first = $request->file('logo1');
                $logoname_first =  $logo_first->getClientOriginalName();
                $path = 'orgnization';
                $logo_first->move($path , $logoname_first);
                $orgnization_logo1 = $logoname_first;
         /**
             * Add Orgnization logo_second  
             *
             *
             * @return \App\Orgnization
         */
                $logo_second = $request->file('logo2');
                $logoname_second =  $logo_second->getClientOriginalName();
                $path = 'orgnization';
                $logo_second->move($path , $logoname_second);
                $orgnization_logo2 = $logoname_second;
                
                $uid = Auth::user()->id;
                $org_id = $request->org_id;
                $org =  Orgnization::find($org_id);
                $org->name = $request->name;
                $org->webaddress = $request->web;
                $org->phoneno = $request->phone;
                $org->address = $request->address;
                $org->email_first = $request->femail;
                $org->status = $request->status;
                $org->logo1 =  $orgnization_logo1;
                $org->logo2 =  $orgnization_logo2;
                $org->firstname = $request->fname;
                $org->lastname = $request->lname;
                $org->email_second = $request->email_second;
                $org->mobileno = $request->mobileno;
                $org->user_id = $uid;
                $org->save();
                session()->flash('msg',' Orgnization Updated sucessfully');
                return redirect ('orgnization/list');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_org = Orgnization::find($id);
        $delete_user_org = $delete_org->delete($id);
        session()->flash('msg',' Orgnization  Deleted sucessfully');
        return redirect ('orgnization/list');
    }
}
