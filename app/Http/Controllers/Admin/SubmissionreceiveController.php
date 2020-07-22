<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Customaccept;
use App\Mail\RejectMail;
use App\Mail\SendapprovedMail;
use App\Models\Author\Submit;
use App\Models\Category;
use App\Models\Payagreement;
use App\Models\Submission_timer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class SubmissionreceiveController extends Controller
{

    public function index()
    {
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
            // return $submits;
        return view('admin.author.submission.all', compact('submits'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $paper = DB::table('submits as sub')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st', 'st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->select('*', 'cat.name as catName', 'st.id as volumeno', 'st.cat_folder as cat_folder', 'st.volume as volume', 'st.issue as issue')
            ->first();
        return view('admin.author.submission.show', compact('paper'));
    }

    public function edit($id)
    {
        $submit = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName','cat.id as catId','st.id as volumeno','st.cat_folder as cat_folder','st.volume as volume','st.issue as issue')
            ->first();
//        dd($submit);

        $categories = Category::all();
        return view('admin.author.submission.edit', compact('categories','submit'));
    }

    public function update(Request $request, $id)
    {
        $funder_name_arr = array(
            array(
                "funder_name" => $request->funder_name1,
                "funder_gant_no" => $request->funder_gant_no1
            ),
            array(
                "funder_name" => $request->funder_name2,
                "funder_gant_no" => $request->funder_gant_no2
            ),
            array(
                "funder_name" => $request->funder_name3,
                "funder_gant_no" => $request->funder_gant_no3
            )
        );
        $funder_name_json = json_encode($funder_name_arr);

        $author_name_arr = $request->author_name;
        $author_name_json = json_encode($author_name_arr);

        $this->validate($request , [
            'type_id' => 'required',
            'journal_id' => 'required',
            'aresearch' => 'required',
            'ptitle' => 'required',
        ]);

//        $docx = $request->file('docx');
        $pdf = $request->file('pdf');
        $slug = str_slug($request->ptitle);
        $submit = Submit::find($id);
        $submission = Submission_timer::find($request->issue_id);
        if(isset($pdf)){
            if (file_exists('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue.'/'.$submit->pdf )){
                unlink('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue .'/'. $submit->pdf);
            }
            $pdfname = $slug.'-'.uniqid().'.'.$pdf->getClientOriginalExtension();

            if (!file_exists('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue)){
                mkdir('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, 0777, true);
            }
            $pdf->move('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, $pdfname);
        }else{
            $pdfname = $submit->pdf;
        }

        $paperId = $submit->paper_id;

        $submit->paper_id = $paperId;
        $submit->user_id = $submit->user_id;
        $submit->type_id = $request->type_id;
        $submit->journal_id = $request->journal_id;
        $submit->issue_id = $request->issue_id;
        $submit->aresearch = $request->aresearch;
        $submit->ptitle = $request->ptitle;
        $submit->title_slug = str_slug($request->ptitle);
        $submit->docx = $submit->docx;
        $submit->pdf = $pdfname;


        $submit->author_name = $author_name_json;
        $submit->paper_tags = $request->paper_tags;
        $submit->funder_name = $funder_name_json;

        $submit->no_figures = $request->no_figures;
        $submit->no_tables = $request->no_tables;
        $submit->no_words = $request->no_words;
        $submit->terms_and_condition = $request->terms_and_condition;
        $submit->agreement = $request->agreement;
        $submit->abstract = $request->abstract;
        $submit->save();

        return redirect()->route('admin.author-submission.index');
    }

    public function destroy($id)
    {
        $submission = DB::table('submits as sub')
            ->join('submission_timers as st', 'st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->select('sub.id as id', 'st.cat_folder as cat_folder', 'st.volume as volume', 'st.issue as issue', 'sub.docx as docx', 'sub.pdf as pdf')
            ->first();
        if (file_exists('volume/' . $submission->cat_folder . '/' . $submission->volume . '/' . $submission->issue . '/' . $submission->docx
            && 'volume/' . $submission->cat_folder . '/' . $submission->volume . '/' . $submission->issue . '/' . $submission->pdf)) {
            unlink('volume/' . $submission->cat_folder . '/' . $submission->volume . '/' . $submission->issue . '/' . $submission->docx);
            unlink('volume/' . $submission->cat_folder . '/' . $submission->volume . '/' . $submission->issue . '/' . $submission->pdf);
        }
        $submit = Submit::find($id);
        $submit->delete();

        return back();
    }

    public function approved($id)
    {
        $submit = DB::table('submits as sub')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st', 'st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->select('*', 'cat.name as catName', 'st.id as volumeno', 'st.cat_folder as cat_folder', 'st.volume as volume', 'st.issue as issue')
            ->first();
        $user = User::find($submit->user_id);
        DB::table('submits')->where('id', $id)->update(['status' => 1]);
        $this->sendApprovedMail($submit, $user);
        return back();
    }

    public function sendApprovedMail($submit, $user)
    {
        Mail::to($user->email)->queue(new SendapprovedMail($submit, $user));
    }

    public function customaccept(Request $request, $id){
        $body = $request->body;
        $submit = DB::table('submits as sub')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st', 'st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->select('sub.*', 'cat.name as catName', 'st.id as volumeno', 'st.cat_folder as cat_folder', 'st.volume as volume', 'st.issue as issue')
            ->first();
        $user = User::find($submit->user_id);
        DB::table('submits')->where('id', $id)->update(['status' => 1]);
        Mail::to($user->email)->queue(new Customaccept($submit, $user, $body));
        return back();
    }

    public function rejected($id)
    {
        $submit = DB::table('submits as sub')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st', 'st.id', '=', 'sub.issue_id')
            ->where('sub.id', $id)
            ->select('*', 'cat.name as catName', 'st.id as volumeno', 'st.cat_folder as cat_folder', 'st.volume as volume', 'st.issue as issue')
            ->first();
        $user = User::find($submit->user_id);
        DB::table('submits')->where('id', $id)->update(['status' => 2]);
        $this->rejectedMail($submit, $user);
        return back();
    }

    public function rejectedMail($submit, $user)
    {
        Mail::to($user->email)->queue(new RejectMail($submit, $user));
    }

    function accepted(){
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->Where('sub.status', '=', 1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
        return view('admin.author.submission.accepted', compact('submits'));
    }

    function reject(){
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->Where('sub.status', '=', 2)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
        return view('admin.author.submission.reject', compact('submits'));
    }

    function pending(){
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->Where('sub.status', '=', 0)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
        return view('admin.author.submission.pending', compact('submits'));
    }

    function paid(){
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->Where('sub.is_payment', '=', 1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
        return view('admin.author.submission.paid', compact('submits'));
    }

    function published(){
        $submits = DB::table('submits as sub')
            ->join('users as user', 'user.id', '=', 'sub.user_id')
            ->join('categories as cat', 'cat.id', '=', 'sub.journal_id')
            ->Where('sub.publish', '=', 1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*', 'user.firstname as authorname','cat.name as catName')
            ->get();
        return view('admin.author.submission.published', compact('submits'));
    }
    function autoPublished($id){
        $submit = Submit::find($id);

        $submit->status = 1;
        $submit->is_payment = 1;
        $submit->publish = 1;
        $submit->auto_publish = 1;
        $submit->save();

        return back();
    }

    function autoUnpublished($id){
        $submit = Submit::find($id);

        $submit->status = 0;
        $submit->is_payment = 0;
        $submit->publish = 0;
        $submit->auto_publish = 0;
        $submit->save();

        return back();
    }
    function uploadagreement($id){
        $title = 'Upload';
        $paper = Submit::where('id',$id)->first();
        return view('admin.author.submission.upload_agreement', compact('paper','title'));
    }

    public function uploadnow(Request $request){
        $this->validate($request, [
            'agreement' => 'required|mimes:jpeg,jpg,png,pdf',
        ]);
        $id = $request->submit_id;
        $agreement = $request->file('agreement');
        $payment = $request->file('payment');

        if (isset($agreement)){
            if (isset($payment)){
                $paymentname = $id."-".uniqid().".".$payment->getClientOriginalExtension();
                if (!file_exists('payagreementpaper')){
                    mkdir('payagreementpaper',0777, true);
                }
                $payment->move('payagreementpaper', $paymentname);
            }else{
                $paymentname = null;
            }
            $agreementname = $id."-".uniqid().".".$agreement->getClientOriginalExtension();
            if (!file_exists('payagreementpaper')){
                mkdir('payagreementpaper',0777, true);
            }
            $agreement->move('payagreementpaper', $agreementname);

        }

        $payagrement = new Payagreement();
        $payagrement->submit_id = $request->submit_id;
        $payagrement->agreement = $agreementname;
        $payagrement->payment = $paymentname;
        $payagrement->save();
        Session::flash('success', 'Upload Successful!');
        return back();
    }
    public function editagreement($id){
        $title = 'Edit';
        $agreement = Payagreement::where('id',$id)->first();
        $paper = Submit::where('id',$agreement->submit_id)->first();
        return view('admin.author.submission.upload_agreement', compact('paper','title','agreement'));
    }
    public function editnow(Request $request, $id){
        $this->validate($request, [
            'agreement' => 'mimes:jpeg,jpg,png,pdf',
        ]);
        // $id = $request->submit_id;
        $agreement = $request->file('agreement');
        $payment = $request->file('payment');

        $payagrement = Payagreement::find($id);

        if (isset($agreement)){
            if (file_exists('payagreementpaper/'.$payagrement->agreement)){
                unlink('payagreementpaper/'.$payagrement->agreement);
            }
            $agreementname = $id."-".uniqid().".".$agreement->getClientOriginalExtension();
            if (!file_exists('payagreementpaper')){
                mkdir('payagreementpaper',0777, true);
            }
            $agreement->move('payagreementpaper', $agreementname);

        }else{
            $agreementname = $payagrement->agreement;
        }


        $payagrement->submit_id = $payagrement->submit_id;
        $payagrement->agreement = $agreementname;
        $payagrement->payment = $payagrement->payment;
        $payagrement->save();
        DB::table('payagreements')->where('submit_id', $id)->update(['update_count' => 1]);
        Session::flash('success', 'Edit Successful!');
        return back();
    }

}
