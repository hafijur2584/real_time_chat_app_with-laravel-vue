<?php

namespace App\Http\Controllers;

use App\Events\newMessage;
use App\Models\Message;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacts(){
        $contacts = User::where('id','!=',auth()->id())->get();
        return $contacts;
    }
    public function getMessagesFor($id){
        $messages = Message::where('from',$id)->orWhere('to',$id)->get();
        return $messages;
    }

    public function send(Request $request){
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        broadcast(new newMessage($message));
        return response()->json($message);
    }
}
