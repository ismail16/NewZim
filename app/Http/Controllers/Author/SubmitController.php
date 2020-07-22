<?php

namespace App\Http\Controllers\Author;

use App\Mail\SendpostMail;
use App\Models\Author\Submit;
use App\Models\Category;
use App\Models\Payagreement;
use App\Models\Submission_timer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;


class SubmitController extends Controller
{

    public function index()
    {
        $submits = DB::table('submits as sub')
                        ->join('categories as cat','cat.id', '=', 'sub.journal_id')
                        ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
                        ->where('sub.user_id', Auth::user()->id)
                        ->orderBy('sub.id', 'DESC')
                        ->select('sub.*','cat.name as catName')
                        ->get();

        return view('author.pages.submit.all', compact('submits'));
    }


    public function create()
    {
        $category = Category::orderBy('id', 'desc')->first();
        $submissiontimer = Submission_timer::orderBy('id', 'DESC')->where('status', 1)->first();
        return view('author.pages.submit.new',compact('category', 'submissiontimer'));
    }

    public function cate_id_selector(Request $request){
        $cate_id = $request->cate_id;
        $cate_id_selector = Submission_timer::orderBy('id', 'DESC')->where('category_id', $cate_id)->first();
        return json_encode($cate_id_selector);
    }


    public function store(Request $request)
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
        //   'docx' => 'required|mimes:doc,docx',
        //   'pdf' => 'required|mimes:pdf',

        ]);

        $docx = $request->file('docx');
        $pdf = $request->file('pdf');
        $slug = str_slug($request->ptitle);
        $submission = Submission_timer::find($request->issue_id);
        if(isset($docx, $pdf)){
            $docxname = $slug.'-'.uniqid().'.'.$docx->getClientOriginalExtension();
            $pdfname = $slug.'-'.uniqid().'.'.$pdf->getClientOriginalExtension();

            if (!file_exists('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue)){
                mkdir('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, 0777, true);
            }
            $docx->move('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, $docxname);
            $pdf->move('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, $pdfname);
        }

        $day = date("d");
        $month = date("m");
        $yr = date("y");
        $date = $day.$month.$yr;

        if (Submit::count() > 0){
            $last_id_temp= Submit::all()->last()->id;
        }else{
            $last_id_temp = 0;
        }

        $last_id = $last_id_temp+1;

        $category = Category::find($request->journal_id);

        $paperId = strtoupper($category->tag).$date.$submission->volume.$submission->issue.$last_id;


        $ip = request()->ip();
        $vpnurl = "https://proxycheck.io/v2/{$ip}";
        $details = json_decode(file_get_contents($vpnurl));
        $arr = (array) $details;
        $data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if($arr['status'] == 'error'){
            $vpn = '';
        }else{
            $vpn = $arr[$ip]->proxy;
        }

        $submit = new Submit;
        $submit->vpn = $vpn;
        $submit->syscountry = $data->geoplugin_countryName;
        $submit->paper_id = $paperId;
        $submit->user_id = Auth::user()->id;
        $submit->type_id = $request->type_id;
        $submit->journal_id = $request->journal_id;
        $submit->issue_id = $request->issue_id;
        $submit->aresearch = $request->aresearch;
        $submit->ptitle = $request->ptitle;
        $submit->title_slug = str_slug($request->ptitle);
        $submit->docx = $docxname;
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
//        return $submit;
        $submit->save();
        $id = DB::getPdo()->lastInsertId();
        $thissubmit = Submit::find($id);
        $user = User::find(Auth::user()->id);

        $this->sendmail($thissubmit, $user, $category);
       return redirect()->route('author.paper-submission.index');
    }

    public function sendmail($thissubmit, $user, $category){
        Mail::to($user->email)->queue(new SendpostMail($thissubmit, $user, $category));
    }


    public function show($id)
    {
        $paper = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.id', $id)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName','st.id as volumeno','st.cat_folder as cat_folder','st.volume as volume','st.issue as issue')
            ->first();
        return view('author.pages.submit.show', compact('paper'));
    }


    public function edit($id)
    {
        $submit = DB::table('submits as sub')
                        ->join('categories as cat','cat.id', '=', 'sub.journal_id')
                        ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
                        ->where('sub.user_id', Auth::user()->id)
                        ->where('sub.id', $id)
                        ->orderBy('sub.id', 'DESC')
                        ->select('sub.*','cat.name as catName','cat.id as catId','st.id as volumeno','st.cat_folder as cat_folder','st.volume as volume','st.issue as issue')
                        ->first();
        $categories = Category::all();
        return view('author.pages.submit.edit', compact('categories','submit'));
    }


    public function update(Request $request, $id)
    {
//        return $request;
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

//        $author_name_arr = array(
//            array(
//                "author_name" => $request->author_name1
//            ),
//            array(
//                "author_name" => $request->author_name2,
//            ),
//            array(
//                "author_name" => $request->author_name3
//            )
//        );
//        $author_name_json = json_encode($author_name_arr);
        $author_name_arr = $request->author_name;
        $author_name_json = json_encode($author_name_arr);

        $this->validate($request , [
            'type_id' => 'required',
            'journal_id' => 'required',
            'aresearch' => 'required',
            'ptitle' => 'required',

//            'docx' => 'mimes:doc,docx',
//            'pdf' => 'mimes:pdf',
        ]);

        $docx = $request->file('docx');
        $slug = str_slug($request->ptitle);
        $submit = Submit::find($id);
        $submission = Submission_timer::find($request->issue_id);
        if(isset($docx)){
            if (file_exists('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue.'/'.$submit->docx)){
                unlink('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue .'/'. $submit->docx);
            }

            $docxname = $slug.'-'.uniqid().'.'.$docx->getClientOriginalExtension();
            $pdfname = $submit->pdf;

            if (!file_exists('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue)){
                mkdir('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, 0777, true);
            }
            $docx->move('volume/'.$submission->cat_folder.'/'.$submission->volume.'/'.$submission->issue, $docxname);
        }else{
            $docxname = $submit->docx;
            $pdfname = $submit->pdf;
        }

        $paperId = $submit->paper_id;

        $submit->paper_id = $paperId;
        $submit->user_id = Auth::user()->id;
        $submit->type_id = $request->type_id;
        $submit->journal_id = $request->journal_id;
        $submit->issue_id = $request->issue_id;
        $submit->aresearch = $request->aresearch;
        $submit->ptitle = $request->ptitle;
        $submit->title_slug = Str::slug($submit->ptitle, '-');
        $submit->docx = $docxname;
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

        return redirect()->route('author.paper-submission.index');
    }


    public function destroy($id)
    {
        //
    }

    public function payagreement(Request $request){
        $this->validate($request, [
            'agreement' => 'required|mimes:jpeg,jpg,png,pdf',
            'payment' => 'mimes:jpeg,jpg,png,pdf',
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
        $payagrement->submit_id = $id;
        $payagrement->agreement = $agreementname;
        $payagrement->payment = $paymentname;
        $payagrement->save();
        Session::flash('success', 'Upload Successful!');
        return back();
    }
    public function editpayagreement(Request $request){
        $this->validate($request, [
            'agreement' => 'mimes:jpeg,jpg,png,pdf',
            'payment' => 'mimes:jpeg,jpg,png,pdf',
        ]);
        $id = $request->submit_id;
        $agreement = $request->file('agreement');
        $payment = $request->file('payment');

        $payagrement = Payagreement::where('submit_id',$id)->first();

        if (isset($agreement)){
            if (file_exists('payagreementpaper/'.$payagrement->agreement)){
                unlink('payagreementpaper/'.$payagrement->agreement);
            }
                if (isset($payment)){
                    if (file_exists('payagreementpaper/'.$payagrement->payment)){
                        unlink('payagreementpaper/'.$payagrement->payment);
                    }
                    $paymentname = $id."-".uniqid().".".$payment->getClientOriginalExtension();
                    if (!file_exists('payagreementpaper')){
                        mkdir('payagreementpaper',0777, true);
                    }
                    $payment->move('payagreementpaper', $paymentname);
                }else{
                    if ($payagrement->payment != null){
                        $paymentname = $payagrement->payment;
                    }else{
                        $payagrement = null;
                    }

                }
            $agreementname = $id."-".uniqid().".".$agreement->getClientOriginalExtension();
            if (!file_exists('payagreementpaper')){
                mkdir('payagreementpaper',0777, true);
            }
            $agreement->move('payagreementpaper', $agreementname);

        }else{
            $agreementname = $payagrement->agreement;
        }


        $payagrement->submit_id = $id;
        $payagrement->agreement = $agreementname;
        $payagrement->payment = $paymentname;
        $payagrement->save();
        DB::table('payagreements')->where('submit_id', $id)->update(['update_count' => 1]);
        Session::flash('success', 'Edit Successful!');
        return back();
    }

    function reject(){
        $submits = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.status', 2)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName')
            ->get();

        return view('author.pages.submit.reject', compact('submits'));
    }
    function pending(){
        $submits = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.status', '=',0)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName')
            ->get();

        return view('author.pages.submit.pending', compact('submits'));
    }

    function accepted(){
        $submits = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.status', '=',1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName')
            ->get();

        return view('author.pages.submit.accepted', compact('submits'));
    }

    function paid(){
        $submits = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.is_payment', '=',1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName')
            ->get();

        return view('author.pages.submit.paid', compact('submits'));
    }
    function published(){
        $submits = DB::table('submits as sub')
            ->join('categories as cat','cat.id', '=', 'sub.journal_id')
            ->join('submission_timers as st','st.id', '=', 'sub.issue_id')
            ->where('sub.user_id', Auth::user()->id)
            ->where('sub.publish', '=',1)
            ->orderBy('sub.id', 'DESC')
            ->select('sub.*','cat.name as catName')
            ->get();

        return view('author.pages.submit.published', compact('submits'));
    }

    function uploadagreement($id){
        $title = 'Upload';
        $paper = Submit::where('id',$id)->first();
        return view('author.pages.submit.upload_agreement', compact('paper','title'));
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

}
