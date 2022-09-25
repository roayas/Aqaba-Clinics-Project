<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Days_off;
use Session;

class bookSettingController extends Controller
{
    //
    public function bookSetting(){
        $data=Clinic::find(Session::get('id'));
        return view('admin.bookingSetting', compact('data'));
    }
    
    public function bookingSetting(Request $request){
        $request->validate([
            'time_start'=>'required',
            'time_end'=>'required',
            'day_1_off'=>'nullable',
            'day_2_off'=>'nullable',
            'app_length'=>'required',
            'date'=>'nullable|date|after:yesterday',
            'title'=>'nullable|string',
           ]);
           $date=$request->input('date');
           $app_length=$request->input('app_length');
           if ($date){
           $day_off=new Days_off();
           $day_off->date=$date;
           $day_off->title=$request->input('title');
           $day_off->clinic_id=Session::get('id');
           $day_off->save();
         }
         $data=Clinic::find(Session::get('id'));
         $data->time_start=$request->input('time_start');
         $data->time_end=$request->input('time_end');
         $data->day_1_off=$request->input('day_1_off');
         $data->day_2_off=$request->input('day_2_off');
         if($app_length==30){
         $data->app_length=$request->input('app_length');
         $data->iteration=2;
         }elseif($app_length==60){
            $data->app_length=$request->input('app_length');
            $data->iteration=1;
        }elseif($app_length==90){
            $data->app_length=$request->input('app_length');
            $data->iteration=0.6666;
        }elseif($app_length==120){
            $data->app_length=$request->input('app_length');
            $data->iteration=0.5;
        }
         $data->update();
         return redirect('/bookSetting')->with('message','The setting has been updated successfully');
       }
}
