<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookController extends Controller
{
    //
    public function searchAp(Request $request){
        $date=$request->input('date');
        $clinic=$request->input('clinic');
        $data1 =DB::table('time_schedules')
        ->where('time_date', $date )-> where('clinic_id', $clinic)
        ->get();
        $data2 =DB::table('clinics')
        -> where('id', $clinic)
        ->get();
    
//     $startTime = Carbon::parse('8:00');

// $plus = $startTime->addMinutes(30);


// dd($plus->format('H:i'));
        // return redirect()->back()->with('data1', $data1, );
        return redirect("/book2/id/".$clinic)->with('data1', $data1);
    }
 
}


