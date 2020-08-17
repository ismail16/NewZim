@extends('website.layouts.master')
@section('title')
Open Access Ploicy | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3  mt-3 text-justify">
                <div class="card-body p-0">
                    @foreach($open_access as $open_acces)
                        <h5>{{ $open_acces->title }}</h5>
                        <div style="">
                            {!! $open_acces->description !!}
                        </div>
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
