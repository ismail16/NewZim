@extends('website.layouts.master')
@section('title')
Open Access Ploicy | Sapporo Medical Journal
@endsection
@section('content')
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-12">
            <header class="page-header">
                <h2>Open Access Policy</h2>
            </header>
            <div class="card-body">
                <div>
                   @foreach($open_access as $open_acces)
                        <h5>{{ $open_acces->title }}</h5>
                        <div style="padding-bottom: 6px; padding-left: 14px;">
                            {!! $open_acces->description !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
