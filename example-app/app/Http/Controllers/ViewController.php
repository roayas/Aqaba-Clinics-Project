<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Services;
use App\Models\Category;
use App\Models\Doctor;
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
        return view('layout.home',compact('data','data2','data3','data4','data5'));
    }
    
    public function about()
    {
        return view('layout.about');
    }
    public function book()
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
        $data = DB::table('time_schedules')->where('user_id', $id) ->where('time_date' , '>=' , Carbon::now()->toDateTimeString())->join('clinics', 'time_schedules.clinic_id', '=', 'clinics.id',)->select('time_schedules.clinic_id','time_schedules.time_date','time_schedules.time_detail','time_schedules.id','time_schedules.is_cancel_user','time_schedules.is_cancel_admin','clinics.clinic_name')->get();
       ;
        return view('layout.userpage',compact('data'));
    }
  
    public function book2($clinic,$date)
    {
        $data = Clinic::find($clinic);
        $data2=DB::table('time_schedules')
        ->where('time_date', $date )-> where('clinic_id', $clinic)
        ->get();
        // dd($data2);
        return view('layout.book2', compact('data','data2'));
    }

    function login(){
        
    }
}

