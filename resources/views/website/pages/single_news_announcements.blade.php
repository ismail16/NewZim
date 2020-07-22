@extends('website.layouts.master')
@section('title')
    News | Sapporo Medical Journal
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-3 shadow-3dp">
                    <div class="card mb-3">
                        <div class="card-header p-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                   <h3 class="ml-2">News And Announcements</h3>
                                </div>

                            </div>
                        </div>
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
            </div>
        </div>
    </div>
@endsection
