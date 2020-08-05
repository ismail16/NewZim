@extends('website.layouts.master') 
@section('title', 'Paper Submission Documentation') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">Paper Submission Documentation</h5>
                <div class="card-body">
                   <div class="col-12">                        
                    <section id="Registration">
                        <div class="">
                            <div class="title-header">
                                <h2>Registration</h2>
                            </div>

                            <h4>Goto <a href="www.maejournal.com" title="maejournal">www.maejournal.com</a> </h4>
                            <h5 class="bg-light text-center">Click "
                                <a href="{{ route('authorregister') }}" class="text-danger font-weight-bold">
                                    <i class="fas fa-user" title="Account"></i> Account >
                                    <i class="fas fa-key" title="Register"></i> Register
                                </a>" From Menu-bar
                            </h5>
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/register.png" class="img-fluid"> -->
                            <h4 class="text-center"> Open Register Form,  Fillup It Carefully.  (<span class="text-danger">*</span>) Mark Field is required these must be fillup </h4>
                            <!-- <center><img src="https://www.maejournal.com/images/submission_guideline/register_form.png" class="img-fluid"></center> -->
                            <h6 class="text-center bg-warning">Please Check Your email Click Confirmation > Then <span class="text-red">‘Login’</span></h6>
                            <hr>
                        </div>
                    </section>

                    <section id="Login">
                        <div class="">
                            <div class="title-header">
                                <h2>Login</h2>
                            </div>
                            <h4>Goto <a href="www.maejournal.com" title="maejournal">www.maejournal.com</a> </h4>
                            <h5 class="bg-light text-center">Click "
                                <a href="{{ route('authorlogin') }}" class="text-danger font-weight-bold">
                                    <i class="fas fa-user" title="Account"></i> Account >
                                    <i class="fas fa-key" title="Home"></i> Login
                                </a>" From Menu-bar
                            </h5>
                            <h4 class="text-center"> Input Your ‘Email’ and ‘Password’ Click ‘Log In’ </h4>
                            <!-- <center> <img src="https://www.maejournal.com/images/submission_guideline/author-login.png" class="img-fluid"></center> -->
                            <h6 class="font-weight-bold">If Login Successfully Then You are in Your Dashboard</h6>
                            <hr>
                        </div>                        
                    </section>

                    <section id="Author-Dashboard" class="_mPS2id-t">
                        <div class="ManuscriptPreparation">
                            <div class="title-header">
                                <h2>Manuscript Submission</h2>
                            </div>
                            <h4>For New Submission Click Submit</h3>
                            <h5 class="bg-light text-center">Click "
                                <a href="{{ route('author.paper-submission.create') }}" class="text-danger font-weight-bold">
                                    <i class="fa fa-upload"></i> New Submit
                                </a>" From Menu-bar
                            </h5>              

                            <h4 class="text-center">Then You See Submit Instruction. Please Make sure Fullfil All  </h4>

                            <h4 class="text-center">Then Click "<span class="text-danger">I Read Continue</span>" For Next Step  </h4>

                            <h4 class="text-center"> Open Submition Form,  Fillup It Caefully.  (<span class="text-danger">*</span>) Mark Field is required these must be fillup </h4>
                            <!-- <center><img src="https://www.maejournal.com/images/submission_guideline/register_form.png" class="img-fluid"></center> -->

                            <h5 class="bg-light text-center">Click "
                                <button id="submit_btn" type="submit" class="btn btn-md btn-primary"><i class="fa fa-upload"></i> Submit</button>
                            </h5>

                            <h6 class="text-center bg-light">Please wait some Moment, your paper Submiting... <br> After successsfully summited Auto ridirect to Submition List, You will See here Your Paper With <button class="btn btn-sm bg-warning"><i class="fa fa-spinner"></i> Pending</button> Status </h6>

                            <div style="border: 1px solid red; padding: 10px;">
                            <h5 class="text-center">Waiting for approval and you will be notified within 5 working days if your paper is acceptable <br>
                                
                                After peer review if your paper is Accepted then your paper status will change <button class="btn btn-sm bg-warning"><i class="fa fa-spinner"></i> Pending</button> to  <button class="btn btn-sm bg-success"><i class="fa fa-check-circle"></i>Accepted</button>  <br> 

                                Now you are eligible to pay your Article Processing Charge (APC)</h5>
                            </div>

                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/author-dashboard-.png" class="img-fluid"> -->
                            <hr>
                    </section>

                    <section id="Payment-System-1" class="_mPS2id-t">
                        <div class="ethicalGuidelines">
                            <div class="title-header">
                                <h2> Pay Your Article Processing Charge (APC)</h2>
                            </div>

                            <h4>For Pay Your Article Processing Charge (APC)</h4>
                            <h5 class="bg-light text-center">Click 
                                <a href="#" class="btn btn-xs bg-aqua-gradient" style="font-weight: bolder !important; background: #31c4f3;"><i class="fa fa-credit-card"></i> Pay Now (APC)</a> button from Payment Column
                            </h5>  


                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/paper_accepted.png" class="img-fluid"> -->
                            <br>
                            <h4>* Open New Page for payment, continue your payment procedure</h4>
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/author_pay_landing.png" class="img-fluid"> -->
                            <h4>* After paid your Article Processing Charge (APC), You will get notified via mail. </h4>

                            <h4>* You download copyright agreement  by click 
                                <a class="btn bg-light border text-dark" href="http://127.0.0.1:8000/CopyrightAgreementForm.pdf">
                                    <i class="fa fa-copyright"></i> <span>Copyright Agreement form</span> <i class="fa fa-download"></i>
                                </a>  From Menu-bar
                            </h4>

                            <h4>* Fillup It and Take Scan Copy OR Image then Mail To
                                <a href="mailto:admin@maejournal.com">admin@maejournal.com</a></h4>
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/agreement_form.png" class="img-fluid"> -->

                            <!-- <h4>* Click <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a> Goto last section of Edit page</h4> -->
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/edit_for_agreement.png" class="img-fluid"> -->

                            <!-- {{-- <h4>* Click Edit Goto last section of Edit page </h4> --}} -->
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/agreement_bank_slip_submit.png" class="img-fluid"> -->
                            <!-- <h4>* Upload Scan copy</h4> -->

                            <!-- <ul> -->
                                <!-- <li>Insert your copyright agreement ( Image or pdf file format ) on Agreement Paper Upload</li> -->
                                <!-- <li>Insert bank payment slip ( Image or pdf format ) in Payment Document Scan Copy Click ‘Upload’</li> -->
                            <!-- </ul> -->
                        </div>
                        <hr>
                    </section>
                    <section id="Payment-System-1" class="_mPS2id-t mb-2">
                        <div class="editorialPrinciples">
                            <!-- <div class="title-header">
                                <h2> Pay Your Article Processing Charge (APC) By Other Methord</h2>
                            </div>
                            <h4>* You download copyright agreement  by click 
                                <a class="btn bg-light border text-dark" href="http://127.0.0.1:8000/CopyrightAgreementForm.pdf">
                                    <i class="fa fa-copyright"></i> <span>Copyright Agreement form</span> <i class="fa fa-download"></i>
                                </a>  From Menu-bar  and  Fill up it. </h4> -->
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/agreement_form.png" class="img-fluid"> -->

                           <!--  <h4>* Collect Bank Payment Slip. </h4>

                            <h4>* Click <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a> Goto last section of Edit page</h4> -->
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/edit_for_agreement.png" class="img-fluid"> -->

                            <!-- <h4>* Upload Scan copy</h4>

                            <ul>
                                <li>insert your copyright agreement ( Image or pdf file format ) on Agreement Paper Upload</li>
                                <li>Inser bank payment slip ( Image or pdf format ) in Payment Document Scan Copy Click ‘Upload’</li>
                            </ul>
 -->
                            <!-- <img src="https://www.maejournal.com/images/submission_guideline/agreement_bank_slip_submit.png" class="img-fluid"> -->
                            <!-- <hr> -->
                            <h2 class="text-center border p-3">
                                <span style="color: green;">All is Done!</span> <br>You will get notified via mail after Paper Published
                            </h2>
                            <div style="border: 1px solid red; padding: 10px; background-color: #f7efd5;">
                            <h5 class="text-center">
                                If you are facing any problem to submit your manuscript <br>
                                
                                Please feel free to contact with our support team via mail<br> 

                                support@maejournal.com</h5>
                            </div>
                    </section>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>

    @endsection