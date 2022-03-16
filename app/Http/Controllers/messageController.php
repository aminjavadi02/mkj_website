<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class messageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function newMessages()
    {
        $messages = Contactus::take(10)->latest()->get()->all();
        return view('component.messages.index')->with('messages', $messages);
    }

    public function allMessages()
    {
        $messages = Contactus::get()->all();
        return view('component.messages.index')->with('messages', $messages);
    }

    public function show(Contactus $id)
    {
        // create show msg card
        return view('component.messages.show')->with('message',$id);
    }

    public function deleteMessage(Contactus $id)
    {
        $id->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }
}
