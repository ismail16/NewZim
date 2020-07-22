@extends('website.layouts.master')
@section('title')
Article Processing Charge | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-12">
            <span class="page-header">
                <h2>Article Processing Charge</h2>
            </span>
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
</div>
@endsection
