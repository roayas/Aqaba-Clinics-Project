<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TimeSchedule;



class adminController extends Controller
{
    //
    public function cal()
    {
        $events=array();
        $data=Book::where('clinic_id', 1)->where('is_cancel_admin', 0)->where('is_cancel_user', 0)->get();
        foreach($data as $i){
        $time = Carbon::parse($i->time_book);
        $end = $time->addMinutes(30);
        
        // dd($i->time_book);
        $events[]=[
            'title'=>$i->user_name,
            'start'=>$i->time_book,
          
        ];}
        return view('admin.calendar',['data'=>$events]);
    }


    public function addBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

     



      
      
    }
}
