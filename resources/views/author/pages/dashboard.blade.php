@extends('author.layouts.app')

@section('title', 'Author Dashboard')

@push('css')

@endpush

@section('content')
    <div class="container well">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paper-submission.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-upload"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Paper Submitted</span>
                            <span class="info-box-number">{{$submit}}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paperpending')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-spinner"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pending Submission</span>
                            <span class="info-box-number">{{$pending}}</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paperaccepted')}}">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Approved Submission</span>
                        <span class="info-box-number">{{$approved}}</span>
                    </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paperreject')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Rejected Submission</span>
                            <span class="info-box-number">{{$reject}}</span>
                      </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paperpaid')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green-active"><i class="fa fa-money"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Paid Submission</span>
                            <span class="info-box-number">{{ $paid }}</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paperpublished')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple-active"><i class="fa fa-cloud-upload"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Published Submission</span>
                            <span class="info-box-number">{{ $published }}</span>
                        </div>
                    </div>
                </a>
            </div>

            @if($paypal > 0)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paper-submission.index')}}">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua-active"><i class="fa fa-cc-paypal"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Paid by Paypal</span>
                      <span class="info-box-number">{{ $paypal }}</span>
                  </div>
              </div>
            </a>
            </div>
            @endif

            @if($stripe > 0)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paper-submission.index')}}">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow-active"><i class="fa fa-credit-card"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Paid by Card</span>
                      <span class="info-box-number">{{ $stripe }}</span>
                  </div>
              </div>
            </a>
            </div>
            @endif

            @if($bank > 0)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('author.paper-submission.index')}}">
                  <div class="info-box">
                    <span class="info-box-icon  bg-info"><i class="fa fa-bank"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Paid by Bank</span>
                      <span class="info-box-number">{{ $bank }}</span>
                  </div>
              </div>
            </a>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')

@endpush
