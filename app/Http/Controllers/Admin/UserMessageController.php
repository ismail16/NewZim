<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact_sent;

class UserMessageController extends Controller
{

    public function index()
    {
        $user_messages = Contact_sent::orderBy('id','desc')->get();
        return view('admin.user_message.index', compact('user_messages'));
    }


    public function show($id)
    {
        $user_feedback = Contact_sent::find($id);
        return view('admin.user_message.show', compact('user_message'));
    }
    public function message_show_admin($id)
    {
        $user_message = Contact_sent::find($id);
        $user_message->status = 1;
        $user_message->update();
        return view('admin.user_message.show', compact('user_message'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $user_feedback = Contact_sent::find($id);

        try {
            $user_feedback->delete();
        } catch (\Exception $e) {
            session()->flash('message', 'Delete Message');
        }
        return back();

        
    }
}
