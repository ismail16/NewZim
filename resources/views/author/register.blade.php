@extends("website.layouts.master")

@section('title', 'Author Registration | Sapporo Medical Journal')
@push('css')
    <style type="text/css" media="screen">
        
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-4 mb-4">
        <div class="col-12 ">
            <div class="card border-gold">
                <header class="page-header">
                    <h2>Register ( Fill in this form to register with us )</h2>
                </header>
                <div class="card-body pt-0">
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
                                <label class="" for="usr">Title: <span>*</span></label>
                                <div class="">
                                    <select class="form-control form-control-sm" required="" name="prefix">
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
                                <label class="mt-2 mb-0" for="first_name">First Name: <span class="text-danger">*</span> </label>
                                <div class="">
                                    <input type="text" name="firstname" class="form-control form-control-sm" required="">
                                </div>
                            </div>

                          {{--   <div class="col-md-4">
                                <label class="mt-2 mb-0" for="mname">Middle Name:</label>
                                <div class="">
                                    <input type="text" name="middlename" class="form-control form-control-sm">
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="lastname">Last Name: <span class="text-danger">*</span> </label>
                                <div class="">
                                    <input type="text" name="lastname" class="form-control form-control-sm" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="email">E-mail: <span class="text-danger">*</span></label>
                                <div class="">
                                    <input id="email_enter" type="email" name="email" required="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="email">Confirm E-mail: <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="email" name="email" required="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="email">Institution:</label>
                                <div class="">
                                    <input type="text" name="institution" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="email">Department:</label>
                                <div class="">
                                    <input type="text" name="department" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mt-2 mb-0" for="usr">Address: <span class="text-danger">*</span></label>
                                <div class="">
                                    <textarea rows="2" name="address" required="" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="useremail">User-ID: <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="email" id="useremail" class="form-control form-control-sm" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="image">Profile Image:</label>
                                <div class="">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="password">Password: <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="password" name="password" class="form-control form-control-sm" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="password_confirmation">Re-type Password: <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="password" name="password_confirmation" class="form-control form-control-sm" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mt-2 mb-0"></label>
                                <div class="">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="form_confirm_terms_of_use" name="confirm_terms_of_use" required="" value="1">
                                            <span class="text-danger">*</span> I have read the <a href="{{ route('terms_condition') }}" title="Terms and Condition">Terms of Use</a> and the <a href="{{ route('privacy_policy') }}" title="Privacy Policy">Privacy Policy</a> and I accept them.
                                        </label>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer  _d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <a href="{{url('/')}}" name="cancel" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Cancel</a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user-plus"></i> Register</button>
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <span class="text-success">
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
</div>

<script>
    $('#email_enter').keyup(function () {
        var email = $(this).val();
        $('#useremail').val(email);
    });
</script>

@endsection
@push('scripts')
<script>
</script>
@endpush

