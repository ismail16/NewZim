@extends('website.layouts.master')
@section('title')
User Feedback | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
 <div class="row d-flex justify-content-center mt-4 mb-4">
    <div class="col-12 ">
        <div class="card border-0">
            <header class="page-header">
                <h2>User Feedback</h2>
            </header>
            <div class="container">
                
            
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
                        <div class="col-md-6">

                            <label class="mt-2 mb-0" for="first_name"> Name: <span class="text-danger">*</span> </label>
                            <div class="">
                                <input type="text" name="name" required="" class="form-control form-control-sm">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="mt-2 mb-0" for="email">E-mail: <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="email" name="email" required="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-2 mb-0" for="email">Re-commend Someone (Optional):</label>
                            <div class="">
                                <input type="email" name="recommend_email"class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-2 mb-0" for="usr">Message/Advice: <span class="text-danger">*</span></label>
                            <div class="">
                                <textarea rows="3" name="message" required="" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-2">
                                <div class="checkbox">
                                    <label>
                                        Did you publish any paper in Sapporo Medical Journal Previously ?
                                        <input type="radio" name="pre_publish" value="1"> Yes
                                        <input type="radio"  name="pre_publish" value="0"> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="float-right">
                                    <a href="https://maejournal.com" name="cancel" class="btn btn-sm btn-danger">Cancel</a>
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
</div>

@endsection
