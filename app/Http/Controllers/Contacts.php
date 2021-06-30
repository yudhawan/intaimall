<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Messages;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Auth;

class Contacts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    function get()
    {
        if (Auth::user()->status==0) {
            $contact = User::where('status', '1')->get();
        }else{
            $contact = User::where('status', '0')->get();
        }

    	return response()->json($contact);
    }
    function getMessagesFor($id)
    {
        if (Auth::user()->status==0) {
            $messages = Messages::where('from', $id)->orWhere('to',$id)->get();
        }else{
            $admin = User::where('status', '0')->first();
            $messages = Messages::where('from', $id)->orWhere('to', $admin->id)->get();
        }

    	//print_r($messages);
    	return response()->json($messages);
    }
    function send(Request $r)
    {
    	$messages=Messages::create([
    		'from' => auth()->id(),
    		'to' => $r->contact_id,
    		'text' =>$r->text
        ]);

    	broadcast(new NewMessage($messages));

    	return response()->json($messages);
    }

}
