<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function contacts(){
        $contacts = User::all();
        return $contacts;
    }
    public function getMessagesFor($id){
        $messages = Message::where('from',$id)->orWhere('to',$id)->get();
        return $messages;
    }
}
