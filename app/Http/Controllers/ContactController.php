<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
    return view('contact');
}
// public function addcontact(){
//     $allcontact=contacts::all();
//     return view('contact',['allcontact'=>$allcontact]);
// }

    public function storeaddcontact(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'phone'=>'required',
        'message'=>'required',
    ]);
    $contact=new contacts();
    $contact->name=$request->name;
    $contact->email=$request->email;
    $contact->subject=$request->subject;
    $contact->phone=$request->phone;
    $contact->message=$request->message;
    $contact->save();
    return redirect('/contact')->with('success', ' تم ارسال الرساله بنجاح..سيتم الرد عما قريب');

}
}
