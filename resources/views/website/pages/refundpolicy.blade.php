@extends('website.layouts.master')
@section('title')
Refund Ploicy | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">title</h5>
                 <div class="card-body">
                <div>
                    <p>Thanks for getting our online services at <a href="https://maejournal.com/">Sapporo Medical Journal</a> operated by Sapporo Medical Journal.

We offer a full money-back guarantee for all onlin services provide on our website. If you are not satisfied with the product that you have got service from us, you can get your money back no questions asked. You are eligible for a full reimbursement within 7 calendar days of your purchase.

After the 7-day period, you will no longer be eligible and won't be able to receive a refund. We encourage our customers to try the product (or service) in the first two weeks after their purchase to ensure it fits your needs.

If you have any additional questions or would like to request a refund, feel free to <a href="https://maejournal.com/contact-us">contact us</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>
@endsection
