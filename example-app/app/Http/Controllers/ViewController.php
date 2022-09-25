<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Services;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Insurancea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ViewController extends Controller
{
    //
    public function home()
    {
        $data=User::all();
        $data=$data->count();
        $data2=Doctor::all();
        $data2=$data2->count(); 
        $data3=Clinic::all();
        $data3=$data3->count(); 
        $data4=DB::table('doctors')->limit(4)->get();
        $data5=Category::all();
        $data6=Insurancea::all();
        return view('layout.home',compact('data','data2','data3','data4','data5','data6'));
    }
    
    public function about()
    {
        return view('layout.about');
    }
    public function book3()
    {
        return view('layout.booking');
    }
    public function book1()
    {
        $data=Clinic::all(); 
        return view('layout.book1', compact('data'));
    }
    public function thank()
    {
        return view('layout.Thanks');
    }
    public function service()
    {
        return view('layout.service');
    }
    public function clinics()
    {
        $data=Clinic::all();
        $data2=Category::all();
        return view('layout.clinics', compact('data','data2'));
    }
    public function clinic($clinic_id )
    {
        $data = Clinic::find($clinic_id);
   

        $data1 =DB::table('services')
        ->where('clinic_id',$clinic_id )
        ->get();
        $data3 =DB::table('doctors')
        ->where('clinic_id',$clinic_id )
        ->get();
       
        return view('layout.singleClinic',compact('data','data1','data3'));
    }
    public function appClinic($id){
        $data = Clinic::find($id);
        session(['clinic'=> $id]);
        session(['clinicName'=> $data->clinic_name]);
        return redirect('book1');
    }
    public function doctors()
    {
        $data=Doctor::all();
        $data2=Category::all();
        return view('layout.doctors', compact('data','data2'));
    }
    public function doctor($doctor_id)
    {
        $data = Doctor::find($doctor_id);
        $data2 =DB::table('education')
        ->where('doctor_id',$doctor_id )
        ->get();
        $data3 =DB::table('experiences')
        ->where('doctor_id',$doctor_id )
        ->get();
        $data4 =DB::table('skills')
        ->where('doctor_id',$doctor_id )
        ->get();
        $data5 =DB::table('clinics')
        ->where('id',$data->clinic_id )
        ->get();
        return view('layout.singledoctor',compact('data','data2','data3','data4','data5'));
    }
    public function appDoctor($id){
        $data = Clinic::find($id);
        session(['clinic'=> $id]);
        session(['clinicName'=> $data->clinic_name]);
        return redirect('book1');
    }
    public function contact()
    {
        return view('layout.contact');
    }
    public function user()
    {
        $id = Auth::user()->id;
        $data = DB::table('books')->where('user_id', $id) ->where('time_book' , '>=' , Carbon::now()->toDateTimeString())->join('clinics', 'books.clinic_id', '=', 'clinics.id',)->select('books.clinic_id','books.time_book','books.id','books.is_cancel_user','books.is_cancel_admin','clinics.clinic_name')->get();
       ;
        return view('layout.userpage',compact('data'));
    }
  
    public function book2($clinic,$date)
    {
        $data = Clinic::find($clinic);
        $data2=DB::table('books')
        ->where('time_date', $date )-> where('clinic_id', $clinic)
        ->get();
        //  dd($data2); 
        $data3 = DB::table('days_offs')->where('clinic_id', $clinic) ->where('date' , '>=' , Carbon::now()->toDateTimeString())->get();
        // dd($data2);
        return view('layout.book2', compact('data','data2','data3'));
    }

    function login(){
        
    }

    public function changePassword()
    {
        return view('layout.changePassworde');
    }
}

