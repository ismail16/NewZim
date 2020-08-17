@extends('website.layouts.master')
@section('title',$article->ptitle)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 mt-3">
            @php
                $volume = \App\Models\Submission_timer::find($article->issue_id);
                $category = \App\Models\Category::find($article->journal_id);
            @endphp
            <div class="col-md-12 services align-self-stretch px-4 ftco-animate">
                <div class="d-block">
                    <div class="card-body  p-0">
                        <!-- <h3 class="heading">ORIGINAL ARTICLE</h3> -->
                        <div class="media-body">
                            <div class="border p-2">
                                <strong>Title:</strong> 
                                <a onclick="view_count_submit('<?php echo $article->id;?>')" href="{{ route('single_article',$article->title_slug)}}">
                                    {{ $article->ptitle }}
                                </a>
                            </div>
                            <p class="border p-2  m-0">Author: 
                                <?php
                                $author_names = json_decode($article->author_name, true);
                                foreach ($author_names as $key => $author_name) {
                                    ?>
                                    <span class="badge badge-light">
                                        <?php if ($author_name != '') echo $author_name.","; ?>
                                    </span>
                                    <?php
                                };
                                ?>
                            </p>
                            <p class="border p-2"><strong>Abstract:</strong> 
                                {!! $article->abstract !!}

                                <a onclick="view_count_submit('<?php echo $article->id;?>')" target="_blank" class="obj_galley_link pdf" href="{{asset('volume/'.$volume->cat_folder.'/'.$volume->volume.'/'.$volume->issue.'/'.$article->pdf)}}">Download PDF <i class="fa fa-download"></i></a>
                            </p>
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
