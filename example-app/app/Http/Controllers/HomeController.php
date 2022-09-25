<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get('path')){
            return redirect('book3');
        }else{
            $id = Auth::user()->id;
            $data = DB::table('books')->where('user_id', $id) ->where('time_book' , '>=' , Carbon::now()->toDateTimeString())->join('clinics', 'books.clinic_id', '=', 'clinics.id',)->select('books.clinic_id','books.time_book','books.id','books.is_cancel_user','books.is_cancel_admin','clinics.clinic_name')->get();
            return view('home',compact('data'));
        }
        
    }
}
