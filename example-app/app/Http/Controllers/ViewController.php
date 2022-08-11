<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    //
    public function home()
    {
        return view('layout.home');
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
        return view('layout.clinics', compact('data'));
    }
    public function clinic($clinic_id )
    {
        $data = Clinic::find($clinic_id);
   

        $data1 =DB::table('services')
        ->where('clinic_id',$clinic_id )
        ->get();
        return view('layout.singleClinic',compact('data','data1'));
    }
    public function doctors()
    {
        return view('layout.doctors');
    }
    public function doctor()
    {
        return view('layout.singledoctor');
    }
    public function contact()
    {
        return view('layout.contact');
    }
    public function user()
    {
        return view('layout.userpage');
    }
    public function book2($clinic)
    {
        $data = Clinic::find($clinic);
        return view('layout.book2', compact('data'));
    }
}

