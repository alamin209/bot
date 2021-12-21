<?php

namespace App\Http\Controllers;

use App\Mail\DynamicEmail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\BotSet;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingsData = BotSet::orderBy('id', 'desc')->first();
        return view('settings.create')->with([
            'settingsData' => $settingsData,
        ]);
    }

 
    public function store(Request $request)
    {
        $boot =BotSet::orderBy('id', 'desc')->first();;

        if(isset($boot)){

        if($request->filled('send_hr')){

            $boot->send_hr= $request->send_hr;
        
        }

        if($request->filled('send_to')){

            $boot->send_to= $request->send_to;
        
        }


        if($request->filled('host')){

            $boot->host= $request->host;
        
        }
        if($request->filled('port')){

            $boot->port= $request->port;
        
        }

        
        if($request->filled('username')){

            $boot->username= $request->username;
        
        }
        if($request->filled('password')){

            $boot->password= $request->password;
        
        }
        if($request->filled('host_mail')){

            $boot->host_mail= $request->host_mail;
        
        }
        if($request->filled('name')){

            $boot->name= $request->name;
        
        }
        if($request->filled('last')){

            $boot->last= $request->last;
        
        }
        if($request->filled('email')){

            $boot->email= $request->email;
        
        }
        if($request->filled('phone')){

            $boot->phone= $request->phone;
        
        }
        if($request->filled('subject')){

            $boot->subject= $request->subject;
        
        }
        if($request->filled('message')){

            $boot->message= $request->message;
        
        }
        $boot->save();

        Session::flash("success_message", __("setting update successfully"));
        return back();
     
    }
         

    }

    public function sendEmail(Request $request) {
        $toEmail    =   $request->emailAddress;
        
        $settingsData = BotSet::orderBy('id', 'desc')->first();

        $data       =   array(
            'subject' => $settingsData->subject,
            "message"    => $settingsData->message
        );

        if($settingsData){

            $data       =   array(

                'email'        => $settingsData->email,
                'last_name'    => $settingsData->last_name,
                'subject'     => $settingsData->subject,
                'phone'        => $settingsData->phone,
                'name'        => $settingsData->name,
                "message"     => $settingsData->message
            );
    


            Mail::to($toEmail)->send(new DynamicEmail($data));

        }else{

            Mail::to($toEmail)->send(new DynamicEmail($data)); 
        }
        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new DynamicEmail($data));

        if(Mail::failures() != 0) {
            // return back()->with("success", "E-mail sent successfully!");
            Session::flash("success_message", __(" Test E-mail sent successfully"));
            return back();
        }

        else {

            Session::flash("success_message", __(" Test E-mail sent successfully"));
            return back();
        }
    }
}
