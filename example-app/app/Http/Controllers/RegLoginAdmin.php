<?php

namespace App\Http\Controllers;
use App\Models\Clinic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;


class RegLoginAdmin extends Controller
{
    public function logAdmin(){

        return view('admin.loginadmin');
      }



      public function register(){

        return view('admin.register');
      }

      public function reg(Request $request){
        $request->validate([
          'clinic_name'=>'required|string',
          'clinic_email'=>'required|email|unique:clinics',
          'clinic_phone'=>'required|regex:/(07)[0-9]{8}/',
          'pass'=>'required|string|min:8'

        ]);

        $create=new Clinic();
        $create->clinic_name=$request->input('clinic_name');
        $create->clinic_email=$request->input('clinic_email');
        $create->clinic_phone=$request->input('clinic_phone');
        $pass= Hash::make($request->input('pass'));
        $create->pass=$pass;
        $create->save();
        return redirect('/logAdmin');
      }

      public function LoginAdmin(Request $request){

        $email= $request->input('clinic_email');
        $pass= $request->input('pass');
        $data=Clinic::where('clinic_email', $email)->first();
        if ($data) 
        {
          
       
        
          if (Hash::check($pass, $data->pass)) {
            $request->session()->put('id', $data->id);
            $request->session()->put('clinic_license', $data->clinic_license);
            $request->session()->put('clinic_name', $data->clinic_name);
            $request->session()->put('clinic_email ', $data->clinic_email );
            $request->session()->put('clinic_phone', $data->clinic_phone);
            $request->session()->put('cat_id', $data->cat_id);
            $request->session()->put('clinic_img', $data->clinic_img);
            $request->session()->put('commercial_register', $data->commercial_register);
            $request->session()->put('clinic_des', $data->clinic_des);
            $request->session()->put('clinic_short_des', $data->clinic_short_des);
            $request->session()->put('clinic_location', $data->clinic_location);
            $request->session()->put('time_start', $data->time_start);
            $request->session()->put('time_end', $data->time_end);
            // dd(Session::get('id'));

          return  redirect('/main');
        }
        else
        {
          return redirect('/logAdmin')->with('message','Email or password is wrong');
        }
        
        }
        else
        {
          return redirect('/logAdmin')->with('message','Email or password is wrong');
        
        }
    }



    public function logout(){
      if(Session::has('id')){
        Session::pull('id');
        Session::pull('clinicName');
        Session::pull('clinic_license');
        Session::pull('clinic_name');
        Session::pull('clinic_email');
        Session::pull('clinic_phone');
        Session::pull('cat_id');
        Session::pull('clinic_img');
        Session::pull('commercial_register');
        Session::pull('clinic_des');
        Session::pull('clinic_short_des');
        Session::pull('clinic_location');
        Session::pull('time_start');
        Session::pull('time_end');
       
        return redirect('/logAdmin');
      }
      
    }

    public function changePass(){

      return view('admin.changePass');
    }
    
    public function changePassword(Request $request){
      $data=Clinic::find(session('id'));
      $pass= $request->input('old_pass');

      if (Hash::check($pass, $data->pass)) {
      
        $request->validate([
          'new_pass'=>'required|string|min:8',
          'con_pass'=>'required_with:new_pass|same:new_pass|min:8',
        ]);
        $data->pass= Hash::make($request->input('new_pass'));
        $data->update();
        return redirect('/changePass')->with('message2','password is updated successfully');    
    }
    else
    {
      return redirect('/changePass')->with('message','password is wrong');
    }

    }




}
