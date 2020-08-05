@extends('website.layouts.master')
@section('title')
Contacts | Sapporo Medical Journal
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">User Feedback</h5>
                <div class="card-body">
                    <div class="row">
                    @if(session()->has('message'))
                        <div class="col-lg-12 col-xl-12 pl-5 pr-5">
                            <div class="card-box">
                                <div class="alert alert-success text-center">
                                    {{session('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                         <div class="col-md-4 border pt-2">
                            @foreach($contacts as $contact)
                            <div class="address">
                                <!-- <h5>Address:</h5> -->
                                <ul class="list-unstyled">
                                    <li> {{ $contact->office_name }}</li>
                                    <!-- <li> {{ $contact->location_name }}</li> -->
                                </ul>
                            </div>
                            <div class="email">
                                <h5>Email:</h5>
                                <ul class="list-unstyled">
                                    <li> support@maejournal.com</li>
                                    <li> admin@maejournal.com</li>
                                </ul>
                            </div>
                            @endforeach                            
                        </div>

                        <div class="col-md-8">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('contact_sent')}}" method="post" enctype="multipart/form-data" class="border">
                                @csrf
                                <div class="row p-2">
                                    <div class="col-md-6">

                                        <label class="mt-2 mb-0"> Name: <span class="text-danger">*</span> </label>
                                        <div class="">
                                            <input type="text" name="name" required="" class="form-control form-control-sm">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="mt-2 mb-0">E-mail: <span class="text-danger">*</span></label>
                                        <div class="">
                                            <input type="email" name="email" required="" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mt-2 mb-0">Message: <span class="text-danger">*</span></label>
                                        <div class="">
                                            <textarea rows="3" name="message" required="" class="form-control form-control-sm"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-2">
                                            <div class="checkbox">
                                                <label>
                                                    Are you Author this Journal?
                                                    <input type="radio" name="is_author" value="1"> Yes
                                                    <input type="radio"  name="is_author" value="0"> No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="float-right">
                                                <a href="http://mpi.test" name="cancel" class="btn btn-sm btn-danger">Cancel</a>
                                                <input type="submit" value="Submit" name="register" class="btn btn-sm btn-primary ">
                                            </div>
                                        </div>                          
                                    </div> 
                                </div> 
                            </form>
                        </div>

                       

                    </div>
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
