@extends('website.layouts.master')
@section('title')
FAQ | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-12">
            <header class="page-header">
                <h2>FAQs</h2>
            </header>
            <div class="card-body">
                <div>
                    @foreach($faqs as $faq)
                        <ul>
                            <li><strong>{{ $faq->faq_question}}</strong></li>
                        </ul>
                        <p>{!! $faq->faq_answer !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
