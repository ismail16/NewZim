@extends('website.layouts.master')
@section('title')
    Terms and Condition | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-12">
            <header class="page-header">
                <h2>Terms and Condition</h2>
            </header>
            <div class="card-body">
                <div>
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
        </div>
    </div>
</div>
@endsection
