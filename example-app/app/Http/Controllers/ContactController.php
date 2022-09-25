<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use App\Mail\contacts;
use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
    //
    public function contact(Request $request){
        
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|regex:/(07)[0-9]{8}/',
            'subject'=> 'required|string',
            'message'=> 'required|string',
           ]);
           $contact = new Contact();
           $contact->name=$request->input('name'); 
           $contact->email=$request->input('email'); 
           $contact->phone=$request->input('phone'); 
           $contact->subject=$request->input('subject'); 
           $contact->message=$request->input('message'); 
           $contact->save(); 

           $email=[
           'name'=>$request->input('name'),
           'email'=>$request->input('email'),
           'phone'=>$request->input('phone'),
           'subject'=>$request->input('subject'),
           'message'=>$request->input('message'),
           ];

           Mail::to('yasroa41@gmail.com')->send(new contacts($email) );
           return redirect('contact')->with('message','Thank you for your message, We will contact with you as soon as possible');
    }
}
