<?php

namespace App\Http\Controllers;

use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Clinic;
use App\Models\TimeSchedule;
use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use App\Mail\cancelUser;
use App\Mail\cancelClinic;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
        
    }
     
  

    public function editPic(Request $request){
        $id = Auth::user()->id;
         $data = User::find($id);

         $request->validate([
          'img'=> 'required|mimes:jpg,png,jpeg|max:5048'
         ]);
       


         $FileName =  time().'-'.$data->name . '.'.$request->img->extension();
         $file= $request->img->storeAs('img', $FileName , 'public');
         $data-> user_img =$FileName; /// cloum name
         $data->update();
         return redirect('user');
       }

       public function cancelApp($id){
      
        $del=Book::find($id);
        $del-> is_cancel_user =1;
        $del->update();


        $clinicEmail=Clinic::find($del->clinic_id);
        $clinicEmail=$clinicEmail->clinic_email;

        $cancelUser=[
          'clinicName'=>$del->clinic_name,
          'time'=> $del->time_book,
          'user_name'=>$del->user_name,
          'user_id_num'=>$del->user_id_num,
          'user_phone'=>$del->user_phone,
          'email'=>$del->email,
          ];
          Mail::to($del->email)->send(new cancelUser($cancelUser) );

          $cancelClinic=[
          'clinicName'=>$del->clinic_name,
          'time'=> $del->time_book,
          'user_name'=>$del->user_name,
          'user_id_num'=>$del->user_id_num,
          'user_phone'=>$del->user_phone,
          'email'=>$del->email,
            ];
          Mail::to($clinicEmail)->send(new cancelClinic($cancelClinic) );

        return redirect('/user')->with('message3','The appointment has been Canceled successfully');
    
    }
    
       public function updateuser(Request $request)
       {
         $user = Auth::user();

         $request->validate([
          'name'=> 'required|alpha',
          'user_lname'=> 'required|alpha|nullable',
          'email'=> 'required|email',
          'phone'=> 'required|numeric|digits:10|nullable',
         ]);
         
         $user->name=$request->input('name');
         $user->user_lname=$request->input('user_lname');
         $user->user_phone=$request->input('phone');
         $user->email=$request->input('email');
         $user->update();
         return redirect('/user')->with('message','The data has been updated successfully');
       
       }
       public function updateusermed(Request $request)
       {
         $user = Auth::user();

         $request->validate([
          'user_id_num'=> 'numeric|digits:10|unique:users|nullable',
          'user_dob'=> 'date|nullable',
          'height'=> 'numeric|nullable',
          'weight'=> 'numeric|nullable',
          
         ]);
         
         $user->user_id_num=$request->input('user_id_num');
         $user->user_dob=$request->input('user_dob');
         $user->height=$request->input('height');
         $user->gender=$request->input('gender');
         $user->marital=$request->input('marital');
         $user->weight=$request->input('weight');
         $user->blood_type=$request->input('blood_type');
         $user->update();
         return redirect('/user')->with('message1','The data has been updated successfully');
       
       }

       public function changePassword(Request $request){
        $data=Auth::user();
        $pass= $request->input('old_pass');
  
        if (Hash::check($pass, $data->password)) {
        
          $request->validate([
            'new_pass'=>'required|string|min:8',
            'con_pass'=>'required_with:new_pass|same:new_pass|min:8',
          ]);
          $data->password= Hash::make($request->input('new_pass'));
          $data->update();
          return redirect('/changePasswordUser')->with('message2','password is updated successfully');    
      }
      else
      {
        return redirect('/changePasswordUser')->with('message','password is wrong');
      }
      
      }


       
}
