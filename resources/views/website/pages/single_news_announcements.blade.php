@extends('website.layouts.master')
@section('title')
    News | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">News And Announcements</h5>
               <div class="card-body">
                    <div class="container">
                        <div class="row pt-4">
                            <div class="col-12">
                                <p class="ml-2"><strong>{{$news_announcement->title}}</strong></p>
                                <div class="pb-2 ml-2">
                                    {!! $news_announcement->description !!}
                                </div>

                            </div>
                        </div>
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
