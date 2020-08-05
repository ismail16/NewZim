@extends('website.layouts.master')
@section('title')
    Terms and Condition | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">Terms and Condition</h5>
                @foreach($terms as $term)
                    <div class="card-body">
                        <p><strong>{{$term->terms_title}}</strong></p>
                        <div style="padding-left: 14px; margin-bottom: -30px;">
                            <p>
                                {!! $term->terms_description !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>
@endsection
