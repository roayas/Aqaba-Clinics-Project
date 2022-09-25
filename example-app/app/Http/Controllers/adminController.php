<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TimeSchedule;
use Illuminate\Support\Facades\DB;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Category;
use App\Models\Services;
use App\Models\Education;
use App\Models\Skills;
use App\Models\Experience;
use Session;
use App\Mail\cancelUser;
use App\Mail\cancelClinic;
use App\Mail\bookuser;
use App\Mail\bookClinic;
use Mail;

class adminController extends Controller
{
    //
    public function cal()
    {
        $events=array();
        $data=Book::where('clinic_id', Session::get('id'))->where('is_cancel_admin', 0)->where('is_cancel_user', 0)->get();
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


    public function booking(){
        $data =  DB::table("books")->where('clinic_id',Session::get('id'))->where('time_book' , '>=' , Carbon::now()->toDateTimeString())->where('is_cancel_user',0)->where('is_cancel_admin',0)->orderBy(DB::raw("DATE_FORMAT(time_book,'%M/%Y')"), 'DESC')
        ->get();
        $data2=  DB::table("books")->where('clinic_id',Session::get('id'))->where('time_book' , '<=' , Carbon::now()->toDateTimeString())->where('is_cancel_user',0)->where('is_cancel_admin',0)->orderBy(DB::raw("DATE_FORMAT(time_book,'%M/%Y')"), 'DESC')
        ->get();
       
        return view('admin.booking',compact('data','data2'));
    }


    public function addbook(){
        $data = Clinic::find(Session::get('id'));
        $users=DB::table("books")->where('clinic_id',Session::get('id'))->where('user_id','>=',0)->get();
        $users = $users->unique('user_id');
        $data3 = DB::table('days_offs')->where('clinic_id', Session::get('id')) ->where('date' , '>=' , Carbon::now()->toDateTimeString())->get();

        return view('admin.addbook',compact('users','data','data3'));
    }
    public function addBook1(Request $request)
    {
        $data= Clinic::where('id', Session::get('id'))->get();
        foreach($data as $i){
        session(['start'=> $i->time_start]);
        session(['end'=> $i->time_end]);}
        session(['id'=> $i->id]);
        session(['name'=> $i->clinic_name]);
        $request->validate([
            'date'=>'required|date|after:yesterday',
       
        ]);
        $date=$request->input('date');
     
        $data1 =DB::table('books')
        ->where('time_date', $date )-> where('clinic_id', Session::get('id'))
        ->get();
     
        $request->session()->put('datebook', $date);
       
        echo '
        <style>
        .book1{
            display: none;
        }
        </style>
        ';
        return redirect("/addbook")->with('data1', $data1);
    }
    public function addbook2(Request $request){ 
         if($request->input('user_id')){
        $request->validate([
            'admin_add'=>'nullable|string',
            'user_id'=>'nullable',
            'time'=>'required',
        ]);
}
        $user_id=$request->input('user_id');
        $create=new TimeSchedule();
        $create->clinic_id=Session::get('id');
        $create->time_detail=$request->input('time');
        $create->time_date=Session::get('datebook');
        $create->save();

        $book=new Book();

        $book->clinic_id=Session::get('id');
        $book->clinic_name=Session::get('name');
        $time=$request->input('time');
        $date=Session::get('datebook');
        $book->time_date=$date;
        $book->time_detail=$time;
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
        $book->time_book=$combinedDT;
        if($user_id){
            $user=User::find($user_id);
            $book->user_id=$user->user_id;
            $book->user_name=$user->name;
            $book->user_lname=$user->user_lname;
            $book->user_phone=$user->user_phone;
            $book->user_id_num=$user->user_id_num;
            $book->admin_add=1;

            $bookuser=[
                'clinicName'=>Session::get('name'),
                'time'=> $combinedDT,
                'user_name'=>$user->name,
                'user_id_num'=>$user->user_id_num,
                'user_phone'=>$user->user_phone,
                'email'=>$user->email,
                ];
            $bookClinic=[
                'clinicName'=>Session::get('name'),
                'time'=> $combinedDT,
                'user_name'=>$user->name,
                'user_id_num'=>$user->user_id_num,
                'user_phone'=>$user->user_phone,
                'email'=>$user->email,
                ];
        
            $clinicEmail=Clinic::find(Session::get('id'));
            $clinicEmail=$clinicEmail->clinic_email;
     
                Mail::to($user->email)->send(new bookuser($bookuser) );
                Mail::to($clinicEmail)->send(new bookClinic($bookClinic) );
        }
        else{
        $book->admin_add=$request->input('admin_add');
    }
      
        $date = Carbon::parse($date)->format("d-m-Y") ;
        $arr=['date'=>$date, 'time'=>$time];
        $json = json_encode($arr);
        $book->try=$json;
        $book->save();

        $request->session()->forget('datebook');
       
        return redirect('booking')->with('message','The appointment has been added successfully');
    }


    public function userDetails($user_id,$id){
        $data=User::where('id', $user_id)->get();
        foreach($data as $i){
            $data=$i;
        }
        $data2=Book::where('id', $id)->get();
        foreach($data2 as $i){
            $data2=$i;
        }
        return view('admin.userDetails',compact('data','data2'));
    }

    public function cancel($id){
      
        $del=Book::find($id);
        
        $del-> is_cancel_admin =1;
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

        return redirect('/deletedebook')->with('message','The appointment has been Canceled successfully');
    
    }

    public function main(){
        $users=DB::table("books")->where('clinic_id',Session::get('id'))->where('user_id','>=',0)->get();
        $users = $users->unique('user_id');
        $users=$users->count();
       
        $book=DB::table("books")->where('clinic_id',Session::get('id'))->get();
        $book=$book->count();

        $doctor=DB::table("doctors")->where('clinic_id',Session::get('id'))->where('is_delete',0)->get();
        $doctor=$doctor->count();
        
        $today=Book::whereDate('time_book', date('Y-m-d'))->where('user_id','>=',0)->get();
        $tomorrow =Book::whereDate('time_book', '=', \Carbon\Carbon::tomorrow())->where('user_id','>=',0)->get();
        $aftertomorrow =Book::whereDate('time_book', '=',  now()->add('2 day'))->where('user_id','>=',0)->get();

        $doctors=DB::table("doctors")->where('clinic_id',Session::get('id'))->where('is_delete',0)->limit(4)->get();
        return view('admin.mainAdmin',compact('users','book','doctor','today','tomorrow','aftertomorrow','doctors'));

       
    }


    public function profile(){
        $data=Clinic::find(Session::get('id'));
        $data2=Category::find(Session::get('cat_id'));
        $data5=Category::all();
        $data3=DB::table("services")->where('clinic_id',Session::get('id'))->get();
        $data4=DB::table("doctors")->where('clinic_id',Session::get('id'))->where('is_delete',0)->get();

        return view('admin.profile',compact('data','data2','data3','data4','data5'));
    }

    
    public function editPic(Request $request){
        $id = Session::get('id');
         $data = Clinic::find($id);

         $request->validate([
          'img'=> 'required|mimes:jpg,png,jpeg|max:5048'
         ]);
         $FileName =  time().'-'.$data->clinic_name . '.'.$request->img->extension();
         $file= $request->img->storeAs('img', $FileName , 'public');
         $data-> clinic_img =$FileName; /// cloum name
         $data->update();
         $request->session()->put('clinic_img', $data->clinic_img);
         return redirect('profile')->with('message','Clinic Image has been Updated successfully');;
       }


       public function updateClinic(Request $request)
       {
         $clinic = Clinic::find(Session::get('id'));
         $request->validate([
          'clinic_name'=>'required|string',
          'clinic_license'=>'nullable|mimes:jpg,png,jpeg|max:5048',
          'clinic_email'=>'required|email',
          'clinic_phone'=>'required|regex:/(07)[0-9]{8}/',
          'commercial_register'=> 'numeric|nullable',
          'clinic_des'=> 'string|nullable',
          'clinic_short_des'=> 'string|nullable',
          'clinic_location'=> 'string|nullable',
          'time_start'=> 'required',
          'time_end'=> 'required',
          'cat_name'=> 'string|nullable',
         ]);
        $cat_name=$request->input('cat_name');
        if($cat_name){
            $cat=new Category();
            $cat->cat_name=$cat_name;
            $cat->save();
            $id_cat=$cat->id; 
        }
         $clinic->clinic_name=$request->input('clinic_name');
         $FileName =  time().'-'.$clinic->clinic_name . '.'.$request->clinic_license->extension();
         $file= $request->clinic_license->storeAs('img', $FileName , 'public');
         $clinic->clinic_license =$FileName;
         $clinic->clinic_email=$request->input('clinic_email');
         $clinic->clinic_phone=$request->input('clinic_phone');
         $clinic->commercial_register=$request->input('commercial_register');
         $clinic->clinic_des=$request->input('clinic_des');
         $clinic->clinic_short_des=$request->input('clinic_short_des');
         $clinic->clinic_location=$request->input('clinic_location');
         $clinic->time_start=$request->input('time_start');
         $clinic->time_end=$request->input('time_end');
         if(isset($id_cat)){
            $clinic->cat_id=$id_cat;
         }else{
         $clinic->cat_id=$request->input('cat_id');}
         $clinic->update();

         $data=Clinic::find(Session::get('id'));
         $request->session()->put('clinic_name', $data->clinic_name);
         $request->session()->put('clinic_email ', $data->clinic_email );
         $request->session()->put('clinic_phone', $data->clinic_phone);
         $request->session()->put('clinic_license', $data->clinic_license);
         $request->session()->put('cat_id', $data->cat_id);
         $request->session()->put('clinic_img', $data->clinic_img);
         $request->session()->put('commercial_register', $data->commercial_register);
         $request->session()->put('clinic_des', $data->clinic_des);
         $request->session()->put('clinic_short_des', $data->clinic_short_des);
         $request->session()->put('clinic_location', $data->clinic_location);
         $request->session()->put('time_start', $data->time_start);
         $request->session()->put('time_end', $data->time_end);
         return redirect('/profile')->with('message1','The data has been updated successfully');
       
       }

       public function updateLicense(Request $request){
        $clinic = Clinic::find(Session::get('id'));
        $request->validate([  
         'clinic_license'=>'nullable|mimes:jpg,png,jpeg|max:5048',
        ]);
        $FileName =  time().'-'.$clinic->clinic_name . '.'.$request->clinic_license->extension();
        $file= $request->clinic_license->storeAs('img', $FileName , 'public');
        $clinic->clinic_license =$FileName;
        $clinic->update();
        $request->session()->put('clinic_license', $clinic->clinic_license);
        return redirect('/main')->with('message1','The data has been updated successfully');
       }

       public function addService(Request $request){
        $request->validate([
            'service_name'=>'required|string',
           ]);
           $ser=new Services();

           $ser->service_name=$request->input('service_name');
           $ser->clinic_id=Session::get('id');
           $ser->save();
           return redirect('/profile')->with('message3','The data has been added successfully');
       }

       public function deleteService($id){
        $user = Services::find($id);
         $user->delete();
         return redirect('/profile')->with('message4','The data has been deleted successfully');
        }


        public function doctorsAdmin(){

            $data=DB::table("doctors")->where('clinic_id',Session::get('id'))->where('is_delete',0)->get();

            return view('admin.doctorsAdmin',compact('data'));
       }


       
    public function doctorDetails($id){
        $data = Doctor::find($id);
        $data3=DB::table("education")->where('doctor_id', $data->id)->get();
        $data2=DB::table("skills")->where('doctor_id', $data->id)->get();
        $data4=DB::table("experiences")->where('doctor_id', $data->id)->get();
        Session::put('id_doc', $data->id);
        $data5=Category::all();
        return view('admin.doctorDetails',compact('data','data2','data3', 'data4', 'data5'));
    }


    public function cancelDoctor($id){
      
        $del=Doctor::find($id);
        
        $del-> is_delete =1;
        $del->update();
        return redirect('/doctorsAdmin')->with('message','The appointment has been removed successfully');
    
    }

    public function editPicDoc(Request $request){
        
   
        $data = Doctor::find(Session::get('id_doc'));

        $request->validate([
         'img'=> 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $FileName =  time().'-'.$data->doctor_name . '.'.$request->img->extension();
        $file= $request->img->storeAs('img', $FileName , 'public');
        $data-> doctor_img =$FileName; /// cloum name
        $data->update();
          $request->session()->put('clinic_img', $data->clinic_img);
        return redirect('doctorDetails/id/'.Session::get('id_doc'))->with('message','Doctor Image has been Updated successfully');;
      }


      public function updatedoctor(Request $request)
       {
         $doctor = doctor::find($request->input('id'));

         
         $request->validate([
          'doctor_name'=>'required|string',
          'practice_certificate'=>'nullable|mimes:jpg,png,jpeg|max:5048',
          'doctor_email'=>'required|email',
          'doctor_phone'=>'required|regex:/(07)[0-9]{8}/',
          'doctor_des'=> 'required|string',
          'cat_id'=> 'required|numeric',
          'cat_name'=> 'nullable|string',
         ]);
         

        
        $cat_name=$request->input('cat_name');
        if($cat_name){
            $cat=new Category();

            $cat->cat_name=$cat_name;
            $cat->save();
            $id_cat=$cat->id;
            $name_cat=$cat->cat_name;
            
        }
        
         
         $doctor->doctor_name=$request->input('doctor_name');
         $doctor->doctor_email=$request->input('doctor_email');
         $FileName =  time().'-'.$doctor->doctor_name . '.'.$request->practice_certificate->extension();
         $file= $request->practice_certificate->storeAs('img', $FileName , 'public');
         $doctor->practice_certificate =$FileName;
         $doctor->doctor_phone=$request->input('doctor_phone');
         $doctor->doctor_des=$request->input('doctor_des');
       
         if(isset($id_cat)){
            $doctor->cat_id=$id_cat;
            $doctor->cat_name=$name_cat;
         }else{
         $doctor->cat_id=$request->input('cat_id');
         $cat=Category::find($doctor->cat_id);
         $doctor->cat_name=$cat->cat_name;
        }
        Session::put('id_doc', $doctor->id);
         $doctor->update();

   
         return redirect('doctorDetails/id/'.Session::get('id_doc'))->with('message1','The data has been updated successfully');
       
       }
       public function addedu(Request $request){
        $request->validate([
            'edu_name'=>'required|string',
            'edu_des'=>'required|string',
            'edu_from'=>'required|numeric',
            'edu_to'=>'required|numeric',
           ]);
           $edu=new Education();

           $edu->edu_name=$request->input('edu_name');
           $edu->edu_des=$request->input('edu_des');
           $edu->edu_from=$request->input('edu_from');
           $edu->edu_to=$request->input('edu_to');
           $edu->doctor_id=$request->input('id');
           $edu->save();
          
           return redirect('doctorDetails/id/'.Session::get('id_doc').'/#Eduction')->with('message3','The data has been added successfully');
        }

       public function deleteedu($id){
        $user = Education::find($id);
         $user->delete();
         return redirect('doctorDetails/id/'.Session::get('id_doc').'/#Eduction')->with('message4','The data has been deleted successfully');
        }


        public function editedu(Request $request){
            $request->validate([
                'edu_name'=>'required|string',
                'edu_des'=>'required|string',
                'edu_from'=>'required|numeric',
                'edu_to'=>'required|numeric',
               ]);
            $edu = Education::find($request->input('id'));
            $edu->edu_name=$request->input('edu_name');
            $edu->edu_des=$request->input('edu_des');
            $edu->edu_from=$request->input('edu_from');
            $edu->edu_to=$request->input('edu_to');
           
            $edu->update();
             return redirect('doctorDetails/id/'.Session::get('id_doc').'/#Eduction')->with('message5','The data has been updated successfully');
            }

            public function addskill(Request $request){
                $request->validate([
                    'skill_name'=>'required|string',
                   
                   ]);
                   $skill=new Skills();
        
                   $skill->skill_name=$request->input('skill_name');
               
                   $skill->doctor_id=$request->input('id');
                   $skill->save();
                  
                   return redirect('doctorDetails/id/'.Session::get('id_doc').'/#skill')->with('message6','The data has been added successfully');
                }
        
               public function deleteskill($id){
                $user = Skills::find($id);
                 $user->delete();
                 return redirect('doctorDetails/id/'.Session::get('id_doc').'/#skill')->with('message7','The data has been deleted successfully');
                }
        
        
                public function editskill(Request $request){
                    $request->validate([
                        'skill_name'=>'required|string',
                      
                       ]);
                    $skill = Skills::find($request->input('id'));
                    $skill->skill_name=$request->input('skill_name');
                  
                   
                    $skill->update();
                     return redirect('doctorDetails/id/'.Session::get('id_doc').'/#skill')->with('message8','The data has been updated successfully');
                    }
                    public function addexp(Request $request){
                        $request->validate([
                            'exp_name'=>'required|string',
                           
                           ]);
                           $exp=new Experience();
                
                           $exp->exp_name=$request->input('exp_name');
                       
                           $exp->doctor_id=$request->input('id');
                           $exp->save();
                          
                           return redirect('doctorDetails/id/'.Session::get('id_doc').'/#exp')->with('message9','The data has been added successfully');
                        }
                
                       public function deleteexp($id){
                        $user = Experience::find($id);
                         $user->delete();
                         return redirect('doctorDetails/id/'.Session::get('id_doc').'/#exp')->with('message10','The data has been deleted successfully');
                        }
                
                
  public function editexp(Request $request){
      $request->validate([
          'exp_name'=>'required|string',
        
         ]);
      $exp = Experience::find($request->input('id'));
      $exp->exp_name=$request->input('exp_name');
    
     
      $exp->update();
       return redirect('doctorDetails/id/'.Session::get('id_doc').'/#exp')->with('message11','The data has been updated successfully');
      }
  
    public function removedDoc(){
        $data =  DB::table("doctors")->where('is_delete',1)->get();
        return view('admin.removedDoc',compact('data'));
    }


    public function deleteDoc($id){
            $user = Doctor::find($id);
             $user->delete();
        return redirect('removedDoc')->with('message','The data has been deleted successfully');;
    }


    
    public function bakeDoc($id){
        $del=Doctor::find($id);
        $del->is_delete =0;
        $del->update();        
        return redirect('removedDoc')->with('message2','The data has been returned successfully');
    }


    public function addDoctor(){
        $data=Category::all();
        return view('admin.addDoctor',compact('data'));
    }
    public function addedDoctor(Request $request){
          
        $doctor = new Doctor();
        $request->validate([
            'doctor_name'=>'required|string',
            'doctor_email'=>'required|email|unique:doctors',
            'doctor_phone'=>'required|regex:/(07)[0-9]{8}/',
            'doctor_des'=> 'nullable|string',
            'cat_id'=> 'nullable',
            'practice_certificate'=>'nullable|mimes:jpg,png,jpeg|max:5048',
            'doctor_img'=> 'required|mimes:jpg,png,jpeg|max:5048',
            // 'cat_name'=> 'nullable|string',
            'edu_name'=>'required|string',
            'edu_des'=>'required|string',
            'edu_from'=>'required|numeric',
            'edu_to'=>'required|numeric',
            'exp_name'=>'nullable|string',
            'skill_name'=>'nullable|string',
           ]);
// dd($request->input('doctor_name'));
        $cat_name=$request->input('cat_name'); 
        if($cat_name){
            $cat=new Category();
            $cat->cat_name=$cat_name;
            $cat->save();
            $name_cat=$cat->cat_name; 
            $id_cat=$cat->id; 
        } 
       
            $doctor->clinic_id=Session::get('id');
            $doctor->doctor_name=$request->input('doctor_name');
            $FileName =  time().'-'.$doctor->doctor_name . '.'.$request->practice_certificate->extension();
            $file= $request->practice_certificate->storeAs('img', $FileName , 'public');
            $doctor->practice_certificate =$FileName;
            $doctor->doctor_email=$request->input('doctor_email');
            $doctor->doctor_phone=$request->input('doctor_phone');
            $doctor->doctor_des=$request->input('doctor_des');
             
            $FileName =  time().'-'.$request->input('doctor_name'). '.'.$request->doctor_img->extension();
         
            $file= $request->doctor_img->storeAs('img', $FileName , 'public');
            $doctor->doctor_img=$FileName;
            if(isset($id_cat)){ 
               
               $doctor->cat_id=$id_cat;
               $doctor->cat_name=$name_cat;
            }else{
            $doctor->cat_id=$request->input('cat_id');
            $cat=Category::find($doctor->cat_id);
            $doctor->cat_name=$cat->cat_name;
           }
            $doctor->save();

            
            $edu=new Education();
            $edu->edu_name=$request->input('edu_name');
            $edu->edu_des=$request->input('edu_des');
            $edu->edu_from=$request->input('edu_from');
            $edu->edu_to=$request->input('edu_to');
            $edu->doctor_id=$doctor->id;
            $edu->save();



            if($request->input('exp_name')){
            $exp=new Experience();    
            $exp->exp_name=$request->input('exp_name');
            $exp->doctor_id=$doctor->id;
            $exp->save();}


            if($request->input('skill_name')){
            $skill=new Skills();
            $skill->skill_name=$request->input('skill_name');
            $skill->doctor_id=$doctor->id;
            $skill->save();}

return redirect('addDoctor')->with('message','The data has been added successfully');

   
    }



    public function users(){
        $data=DB::table("books")->where('clinic_id',Session::get('id'))->where('user_id','>=',0)->get();
        $data = $data->unique('user_id');
        return view('admin.users',compact('data'));
    }


    public function singleuser($id){
        $data=User::where('id', $id)->get();
        foreach($data as $i){
            $data=$i;
        }
        $data2=DB::table('books')->where('user_id', $id)->where('is_cancel_user', 0)->where('is_cancel_admin', 0)->get();
        $data3=DB::table('books')->where('user_id', $id)->where('is_cancel_user', 1)->orWhere('is_cancel_admin', 1)->get();

        return view('admin.singleuser',compact('data','data2','data3'));
    }

     
    public function deletedebook(){
        $data=DB::table('books')->where('is_cancel_user', 1)->orWhere('is_cancel_admin', 1)->get();
        return view('admin.deletedbook',compact('data'));
    }

    public function deleteBook($id){
        $user = Book::find($id);
         $user->delete();
    return redirect('deletedebook')->with('message2','The data has been deleted successfully');;
}



   }



