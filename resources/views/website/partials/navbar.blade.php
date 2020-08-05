<div class="wrap border-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="_bg-wrap">
                    <div class="row  pl-4 pr-4">
                        <div class="col-md-6 d-flex align-items-center">
                            <a class="navbar-brand" href="index.html">
                                <img src="https://openjournals.bsu.edu/public/journals/1/pageHeaderLogoImage_en_US.png" style="max-height: 75px;">
                            </a>
                        </div>
                        <div class="col-md-6 d-flex justify-content-md-end">

                            <a href="#" class="d-flex align-items-center justify-content-center p-2 _text-white" data-toggle="modal" data-target="#register"><i class="fa fa-key mr-2"> </i>Register</a>

                            <a href="#" class="d-flex align-items-center justify-content-center p-2 _text-white" data-toggle="modal" data-target="#login"><i class="fa fa-key mr-2"> </i>  Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                
                <li class="nav-item"><a href="{{ route('paper_submission_guideline') }}" class="nav-link"> Submission</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Journal</a>
                    <div class="dropdown">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('about_us') }}">About</a>
                            <a class="dropdown-item" href="{{ route('apc') }}">Article Processing Charges</a>
                            <a class="dropdown-item" href="{{ route('open_access') }}">Open Access Policy</a>
                            <a class="dropdown-item" href="{{ route('authors') }}">Authors</a>
                            <a class="dropdown-item" href="{{ route('editors') }}">Editorial Panel</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('contact_us') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>

        <form action="#" class="searchform order-sm-start order-lg-last">
            <div class="form-group d-flex">
                <input type="text" class="form-control border" placeholder="Search">
                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
            </div>
        </form>


    </div>
</nav>


<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <!-- Modal Login-->
        <div class="modal-content">
            <div class="modal-header pt-1 pb-1" style="background-color: #413c69;">
                <h4 class="modal-title text-white">Login</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-3">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label font-weight-bold">E-mail: <span>*</span></label>
                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control-sm w-100 {{$errors->has('email')? 'is-invalid':''}}" name="email" required autocomplete="email" autofocus >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label font-weight-bold">Password: <span>*</span></label>
                        <div class="col-md-9">
                            <input type="password" name="password" required class="form-control-sm w-100 {{$errors->has('password')? 'is-invalid':''}}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-end">
                        <div class="col-sm-9">
                            <input type="submit" class="btn btn-sm btn-primary p-1 mr-3"  tabindex="3" value="Login"/>
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                            <br>
                            <span class="text-dark pl-1">
                                Not yet register? 
                            </span><a href="{{ route('authorregister') }}"> Register Now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pt-1 pb-1" style="background-color: #413c69;">
                <h4 class="modal-title text-white">Register</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body_">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-2">
                        <div class="col-md-12">
                            <label class="mt-0 mb-0 font-weight-bold" for="usr">Title: <span>*</span></label>
                            <div class="">
                                <select class="form-control-sm w-100" required="" name="prefix">
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Dr">Dr.</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="first_name">First Name: <span class="text-danger">*</span> </label>
                            <div class="">
                                <input type="text" name="firstname" class="form-control-sm w-100" required="">
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <label class="mt-2 mb-0" for="mname">Middle Name:</label>
                            <div class="">
                                <input type="text" name="middlename" class="form-control-sm w-100">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="lastname">Last Name: <span class="text-danger">*</span> </label>
                            <div class="">
                                <input type="text" name="lastname" class="form-control-sm w-100" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="email">E-mail: <span class="text-danger">*</span></label>
                            <div class="">
                                <input id="email_enter" type="email" name="email" required="" class="form-control-sm w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="email">Confirm E-mail: <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="email" name="email" required="" class="form-control-sm w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="email">Institution:</label>
                            <div class="">
                                <input type="text" name="institution" class="form-control-sm w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="email">Department:</label>
                            <div class="">
                                <input type="text" name="department" class="form-control-sm w-100">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-2 mb-0 font-weight-bold" for="usr">Address: <span class="text-danger">*</span></label>
                            <div class="mb-n2">
                                <textarea rows="2" name="address" required="" class="form-control-sm w-100"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 d-none">
                            <label class="mt-2 mb-0 font-weight-bold" for="useremail">User-ID: <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="email" id="useremail" class="form-control-sm w-100" required="">
                            </div>
                        </div>
                        <div class="col-md-6 d-none">
                            <label class="mt-2 mb-0 font-weight-bold" for="image">Profile Image:</label>
                            <div class="">
                                <input type="file" name="image" class="form-control-sm w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="password">Password: <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="password" name="password" class="form-control-sm w-100" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0 font-weight-bold" for="password_confirmation">Re-type Password: <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="password" name="password_confirmation" class="form-control-sm w-100" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-2 mb-0"></label>
                            <div class="">
                                <div class="checkbox">
                                    <label class="mt-n3 mb-n3">
                                        <input type="checkbox" id="form_confirm_terms_of_use" name="confirm_terms_of_use" required="" value="1">
                                        <span class="text-danger">*</span> I have read the <a href="{{ route('terms_condition') }}" title="Terms and Condition">Terms of Use</a> and the <a href="{{ route('privacy_policy') }}" title="Privacy Policy">Privacy Policy</a> and I accept them.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer  _d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary p-1 mr-3"><i class="fa fa-user-plus"></i> Register</button>
                            </div> 
                            <div class="col-md-8">
                                <span class="text-dark">
                                    Already Registered?
                                </span><a href="{{ route('authorlogin') }}" title="Login Now"> Login Now</a>
                            </div>                             
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>