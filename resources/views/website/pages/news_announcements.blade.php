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
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <select name="" id="" class="form-control form-control-sm brd-deep-orange-600 border-left-0 text-left">
                                <option>All</option>

                                {{--                                                    @foreach($categories as $category)--}}
                                {{--                                                        <option>{{ $category->tag }}</option>--}}
                                {{--                                                    @endforeach--}}
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm brd-deep-orange-600 border-left-0 text-left" name="jkeyword" id="jkeyword" required="" value="" placeholder="Search for Journal..">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-grey-100 brd-deep-orange-600" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>Open Access bitions and poster presentations.</p>

                        <div class="container">
                            <div class="row pt-4">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card rounded-0" style="border: 1px solid #04386b;">
                                                <h5 class="card-header deep-orange-500 border-top-2 _border-dark-golden-rod rounded-0 fweight-600" >News And Announcements</h5>
                                                <div class="card-body row equal-height" style="min-height: 10rem;">
                                                    @foreach($news_announcements as $news_announcement)
                                                    <div class="col-md-6">
                                                        <a href="{{route('single_news_announcements', $news_announcement->id )}}">{{ $news_announcement->title }}</a>
                                                    </div>
                                                    @endforeach
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
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>

@endsection
