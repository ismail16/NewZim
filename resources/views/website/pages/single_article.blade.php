@extends('website.layouts.master')
@section('title',$article->ptitle)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">title</h5>
                <div class="card-body">
                    discription
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row pt-2">
        <div class="col-12">
            @php
                $volume = \App\Models\Submission_timer::find($article->issue_id);
                $category = \App\Models\Category::find($article->journal_id);
            @endphp
            <header class="page-header">
                <h2>
                    <strong class="badge badge-light">Paper ID :</strong>
                    <span class="font-weight-bold">{{$article->paper_id}}</span> |
                    <strong class="badge badge-light"> View :</strong>
                    <span class="font-weight-bold">{{$article->view_count}}</span>
                </h2>
            </header>
            <div class="card-body pt-2">
                <div class="row">
                    <div class="col-md-9">
                         <div class="card border-0">
                        <div class="border-0 pl-3 mt-2">
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
                        <div class="card-body pt-1 pb-1">                                
                            <div class="">
                                <p class="text-justify"><strong>Abstract : </strong>
                                    {!! $article->abstract !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 round-0">
                            <span class="title mb-0">Volume and Issue</span>
                            <div class="card-footer border-0">
                             <p>Vol - {{$volume->volume}}, Issue - {{$volume->issue}}</p>
                            </div>
                        </div>
                        <div class="card border-0 round-0">
                            <span class="title mb-0">Full Article Download</span>
                            <div class="card-footer border-0">
                                <a onclick="view_count_submit('<?php echo $article->id;?>')" target="_blank" class="obj_galley_link pdf" href="{{asset('volume/'.$volume->cat_folder.'/'.$volume->volume.'/'.$volume->issue.'/'.$article->pdf)}}">Download PDF <i class="fa fa-download"></i></a>
                            </div>
                        </div>
                        <!-- <div class="card border-0 round-0">
                            <span class="title mb-0">Want To get full Paper ?</span>
                            <div class="card-footer border-0">
                                <div class="row">
                                    <div class="col-md-12 border" style="background-color: #fff;">
                                        <h6 class="font-weight-bold pt-2">Have Paper Access Key ?</h6>
                                        <hr>
                                        <form action="#" method="GET">
                                            @csrf
                                            <input type="hidden" name="article_id" value="">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Access Key</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="access_key" placeholder="Access Key" class="form-control form-control-sm">
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-sm btn-success float-right">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                               
                                    <div class="col-md-12 border mt-2" style="background-color: #fff;">
                                        <h6 class="font-weight-bold pt-2">No Paper Access Key (<span class="access">Request for Download</span>)</h6>
                                        <hr>
                                        <form action="#" method="POST">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="name" placeholder="Name" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                <input type="email" name="email" placeholder="Email" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="inputcountryname" placeholder="Country Name" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <button type="submit" class="btn btn-sm btn-info float-right">Send Request</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
