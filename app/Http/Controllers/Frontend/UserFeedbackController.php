<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Author\Submit;
use App\Models\Contact;
use App\Models\UserFeedback;
use App\Models\Category;
use App\Models\Subscribe;
use App\Models\Contact_sent;
use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;

class UserFeedbackController extends Controller
{

    public function create()
    {
        $contact = Contact::all();
        return view('website.pages.user_feedback',compact('contact'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        UserFeedback::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'pre_publish' => $request->pre_publish,
                'recommend_email' => $request->recommend_email,
            ]
        );
        return redirect('/');
    }


    public function contact_sent(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact_sent::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'is_author' => $request->is_author
            ]
        );
        Session::flash('message', 'Thank You For Contact With Us! We Response Very Soon ');
        return back();
    }

    public function show(UserFeedback $userFeedback)
    {
        //
    }

    public function edit(UserFeedback $userFeedback)
    {
        //
    }

    public function update(Request $request, UserFeedback $userFeedback)
    {
        //
    }


    public function destroy(UserFeedback $userFeedback)
    {
        //
    }

    public function view_count_submit(Request $request)
    {
      $submit = Submit::find($request->article_id);
      $submit->view_count = $submit->view_count+1;
      $submit->save();
      return $submit;
    }

    public function subscribe(Request $request){
        $category = Category::orderBy('id', 'desc')->first();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:subscribes',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()){
            return response()->json(['errors'=> 'OPPS! Something wrong! Already subscribe with this Email']);
        }
        $subscribe = new Subscribe;
        $subscribe->category_id = $category->id;
        $subscribe->name = $request->name;
        $subscribe->email = $request->email;
        $subscribe->status = 0;
        $subscribe->save();
        $mail = $request->email;
        Mail::to($mail)->queue(new SubscribeMail());
        return response()->json(['success' => 'Thank you for your subscription']);
    }
}
