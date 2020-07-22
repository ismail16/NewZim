<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserFeedback;

class UserFeedbackController extends Controller
{

    public function index()
    {
        $user_feedbacks = UserFeedback::orderBy('id','desc')->get();
        return view('admin.user_feedback.index', compact(['user_feedbacks']));
    }


    public function show($id)
    {
        $user_feedback = UserFeedback::find($id);
        return view('admin.user_feedback.show', compact('user_feedback'));
    }
    public function feedback_show_admin($id)
    {
        $user_feedback = UserFeedback::find($id);
        $user_feedback->status = 1;
        $user_feedback->update();

        return view('admin.user_feedback.show', compact('user_feedback'));
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
        //
    }
}
