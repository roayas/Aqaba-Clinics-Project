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

class BookController extends Controller
{
    //
    public function searchAp(Request $request){
        // dd(session()->all());
        $request->validate([
            'date'=>'required|date|after:yesterday',
            'clinic'=>'required',
        ]);
        $date=$request->input('date');
        $clinic=$request->input('clinic');
        $data1 =DB::table('time_schedules')
        ->where('time_date', $date )-> where('clinic_id', $clinic)
        ->get();
        $data2 =DB::table('clinics')
        -> where('id', $clinic)
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
    // dd($time);
    $request->session()->put('time', $time);  
  
  
      
    return redirect('book'.'/#book');
 }


 public function book3(Request $request){
    $request->validate([
        'user_name'=>'required|alpha',
        'user_lname'=>'required|alpha',
        'user_id_num'=>'required|numeric|digits:10',
        'user_phone'=>'required|numeric|digits:10',
        'note'=>'nullable',
    ]);
    if(Session::get('loginin')){
        
        $create=new TimeSchedule();
        $create->clinic_id=Session::get('clinic');
        $create->user_id=Auth::user()->id;
        $create->time_detail=Session::get('time');
        $create->time_date=Session::get('date');
        $create->save();

        $book=new Book();
        $book->clinic_name=Session::get('clinicName');
        $book->clinic_id=Session::get('clinic');
        $book->user_id=Auth::user()->id;
        $date=Session::get('date');
        $time=Session::get('time');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
       
        $book->time_book=$combinedDT;
        $book->user_id_num=$request->input('user_id_num');
        $book->user_name=$request->input('user_name');
        $book->user_lname=$request->input('user_lname');
        $book->user_phone=$request->input('user_phone');
        $book->note=$request->input('note');
      
        $book->save();

        $request->session()->forget('clinicName');
        $request->session()->forget('time');
        $request->session()->forget('date');
        $request->session()->forget('clinic');
        $request->session()->forget('user_name');
        $request->session()->forget('user_lname');
        $request->session()->forget('user_id_num');
        $request->session()->forget('user_phone');
        $request->session()->forget('note');
        return redirect('thank');
    }else{
        $request->session()->put('user_name', $request->user_name);
        $request->session()->put('user_lname', $request->user_lname);
        $request->session()->put('user_phone', $request->user_phone);
        $request->session()->put('note', $request->note);
        $request->session()->put('user_id_num', $request->user_id_num);
        $request->session()->put('path', '/book');
        return redirect('login');
    }
  
  
      
    // return redirect('book'.'/#book');
 }


}


