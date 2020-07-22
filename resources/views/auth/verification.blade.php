@extends('website.layouts.master')

@section('title', 'Author Registration Verification')

@push('css')

@endpush

@section('content')

    <div id="content" class="container">
        <div class="row d-flex justify-content-center">
            
            <div id="myJournals" class="col-8 mb-5">
                <div id="" style="height: 300px;" class="card mt-4">
                    <h2 class="card-header">Sapporo Medical Journal</h2>
                    <div id="myAccount" class="card-body text-center" style="padding: 30px 80px;">
                        <h4 style="color: green;">
                            A verification link send to your mail. Please check your mail and 
                            activate your account!
                        </h4>
                        <br>
                        <br>
                        <br>
                    <div class="text-warning well">
                        N.B:  If not found in Inbox please check your spam folder
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
