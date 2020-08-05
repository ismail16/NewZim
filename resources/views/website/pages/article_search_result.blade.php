@extends('website.layouts.master')

@section('title', 'Search Article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">Search Results</h5>
                <div class="card-body">
                    @if(count($articles)>0)
            @foreach($articles as $article)
                <div class="col-md-12 mb-2">
                    <div class="card border-0">
                        <span class="title mb-0">
                            <strong class="badge badge-light">Paper ID :</strong>
                            <span class="font-weight-bold">{{$article->paper_id}}</span> |
                            <strong class="badge badge-light"> View :</strong>
                            <span class="font-weight-bold">{{$article->view_count}}</span>
                        </span>
                        <div class="card-header border-0 pl-3">
                            <div class="float-left">
                                <img src="{{ asset('frontend_assets/img/journals.png') }}" class="d-inline" style="height: 60px; width: 60px;">
                            </div>
                            <div>
                                <div>
                                    <strong>Title : </strong> 
                                    <a onclick="view_count_submit('<?php echo $article->id;?>')" href="{{ route('single_article',$article->title_slug)}}">
                                        {{ $article->ptitle }}
                                    </a>
                                </div>
                                <div>
                                    <strong class="badge badge-light"><i class="fas fa-user"></i> Author :</strong>
                                    <?php
                                        $author_names = json_decode($article->author_name, true);
                                        foreach ($author_names as $key => $author_name) {
                                            ?>
                                            <span>
                                                 <?php if ($author_name != '') echo $author_name.","; ?>
                                            </span>
                                            <?php
                                        };
                                     ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body badge-light pt-1 pb-1">                                
                            <div class="">
                                <p><strong>Abstract : </strong>
                                    {!! $article->abstract !!}
                                </p>
                            </div>
                        </div>

                        <div class="card-footer border-0">
                            <a onclick="view_count_submit('<?php echo $article->id;?>')" href="{{ route('single_article',$article->title_slug)}}" class="">Read More</a>
                            <h1 class="h5 float-right">{{ $category->name }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 d-flex justify-content-center">
                <div class="text-center">
                    {{$articles->links()}}
                </div>
            </div>
            @else
                <div class="col-md-12 text-center">
                   <h1 style="color: red">Sorry !!</h1>
                   <h3>Keywords Not Match with Any journal  </h3><br>
                    <div class="abstract-div">
                        <div class="abstract-cropped">
                            Go to <a href="/">Home</a>
                        </div>
                        <br>
                    </div>
                </div>
            @endif
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>

@endsection