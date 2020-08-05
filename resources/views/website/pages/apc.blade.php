@extends('website.layouts.master')
@section('title')
Article Processing Charge | Sapporo Medical Journal
@endsection
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="_card mb-3 text-justify">
                    <h5 class="_card-header rounded-0 font-size-22">Article Processing Charge</h5>
                    <div class="card-body">
                        <div>
                            @if($apc)
                            {{-- <p><strong>{{ $apc->apc_title }}</strong></p> --}}
                            {!! $apc->apc_description !!}
                            @else
                            <h4 class="text-center">Article Processing Charge Showing here !!</h4>
                            @endif
                        </div>
                        <div class="container text-center page-header">
                            <span class="text-primary" style="border: 2px solid #f10000; padding: 2px 15px;" title="{{$category->name}}">
                             Publication Fee (USD)  is  <span class="text-success font-weight-bold">${{$category->price}}</span>
                            </span>
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
