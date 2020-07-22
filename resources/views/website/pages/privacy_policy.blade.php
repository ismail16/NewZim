@extends('website.layouts.master')
@section('title')
    Privacy Policy | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-12">
            <header class="page-header">
                <h2>Privacy Policy</h2>
            </header>
            <div class="card-body">
                <div>
                   @foreach($privacys as $privacy)
                        <div class="card-body">
                            <p><strong>{{$privacy->privacy_title}}</strong></p>
                            <div style="padding-left: 14px; margin-bottom: -30px;">
                                <p>
                                    {!! $privacy->privacy_description !!}
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
