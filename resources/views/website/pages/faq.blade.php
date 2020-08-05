@extends('website.layouts.master')
@section('title')
FAQ | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">FAQs</h5>
                <div class="card-body">
                    @foreach($faqs as $faq)
                        <ul>
                            <li><strong>{{ $faq->faq_question}}</strong></li>
                        </ul>
                        <p>{!! $faq->faq_answer !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>


@endsection
