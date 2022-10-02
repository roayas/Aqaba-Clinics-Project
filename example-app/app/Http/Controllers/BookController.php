<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Clinic;
use App\Models\Book;
use App\Models\TimeSchedule;
use Session;
use App\Mail\bookuser;
use App\Mail\bookClinic;
use Mail;

class BookController extends Controller
{
    //
    public function book1(Request $request){
        $request->validate([
            'date'=>'required|date|after:yesterday',
            'clinic'=>'required',
        ]);
        $date=$request->input('date');
        // $date=Carbon::parse($date)->format('d-m-y');
        
        
        $clinic=$request->input('clinic');
        $data1 =DB::table('books')
        ->where('time_book', $date )-> where('clinic_id', $clinic)
        ->get();
       
    
        $clinicName = Clinic::find($request->clinic);
        $clinicName= $clinicName->clinic_name;
        $request->session()->put('clinicName', $clinicName);
        $request->session()->put('date', $request->date);
        $request->session()->put('clinic', $request->clinic);
        return redirect("/book2/id/".$clinic."/date/".$date)->with('data1', $data1);
    }


 public function book2(Request $request){
    $time=$request->input('time');  
    $request->session()->put('time', $time);  
  
  
      
    return redirect('book3');
 }


 public function book3(Request $request){
    $request->validate([
        'user_name'=>'required|string',
        'email'=>'required|email',
        'user_id_num'=>'required|numeric|digits:10',
        'user_phone'=>'required|numeric|digits:10',
        'note'=>'nullable',
    ]);
    if(Session::get('loginin')){
        // dd(Session::get('loginin'));
        $book=new Book();
        $book->clinic_name=Session::get('clinicName');
        $book->clinic_id=Session::get('clinic');
        $book->user_id=Auth::user()->id;
        $date=Session::get('date');
        $time=Session::get('time');
        $book->time_date=$date;
        $book->time_detail=$time;
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
        $book->time_book=$combinedDT;
        $book->user_id_num=$request->input('user_id_num');
        $book->user_name=$request->input('user_name');
        $book->user_email=$request->input('email');
        $book->user_phone=$request->input('user_phone');
        $book->note=$request->input('note');
        $book->save();
        $bookuser=[
            'clinicName'=>Session::get('clinicName'),
            'time'=> $combinedDT,
            'user_name'=>$request->input('user_name'),
            'user_id_num'=>$request->input('user_id_num'),
            'user_phone'=>$request->input('user_phone'),
            ];
        $bookClinic=[
            'clinicName'=>Session::get('clinicName'),
            'time'=> $combinedDT,
            'user_name'=>$request->input('user_name'),
            'user_id_num'=>$request->input('user_id_num'),
            'user_phone'=>$request->input('user_phone'),
            'email'=>$request->input('email'),
            ];
    
        $clinicEmail=Clinic::find(Session::get('clinic'));
        $clinicEmail=$clinicEmail->clinic_email;
 
            // Mail::to($request->input('email'))->send(new bookuser($bookuser) );
            // Mail::to($clinicEmail)->send(new bookClinic($bookClinic) );
        $request->session()->forget('clinicName');
        $request->session()->forget('time');
        $request->session()->forget('date');
        $request->session()->forget('clinic');
        $request->session()->forget('user_name');
        $request->session()->forget('email');
        $request->session()->forget('user_id_num');
        $request->session()->forget('user_phone');
        $request->session()->forget('note');
        return redirect('thank');
    }else{
        $request->session()->put('user_name', $request->user_name);
        $request->session()->put('email', $request->email);
        $request->session()->put('user_phone', $request->user_phone);
        $request->session()->put('note', $request->note);
        $request->session()->put('user_id_num', $request->user_id_num);
        $request->session()->put('path', '/book');
        // dd(Session::get('path'));
        return redirect('login');
    }
      
 }


}