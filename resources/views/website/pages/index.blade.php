@extends('website.layouts.master')

@section('title', 'Sapporo Medical Journal | Sapporo Med. J.')

@section('content')
<section class="_ftco-section _ftco-no-pt">
    <div class="container-fluid">
        <div class="row d-flex no-gutters">
            <div class="col-md-3 bg-light p-2">
                <h5 class="text-center mt-2" style="padding: 5px 15px; font-size: 15px; font-weight: bold; background-color: #071949;">
                    <span style=" color: #fff;">
                        Current Issue <br>
                        <hr style="color: #fff !important; border:1px solid; ">
                        Volume - 54, Issue-07
                    </span>
                </h5>
                <a class="btn btn-block btn-success" href="#">
                    Make a Submission
                </a>
                <div class="content">
                    <h2 class="h4">Scopus Indexed Journal</h2>
                    <div class="text-center row pt-1 mb-2" >
                        <div class="col-md-12">
                            <a href="https://www.scopus.com/sourceid/100364" title="Source details" target="_blank">
                                <img src="{{ asset('images/scopus.png')}}" alt="Scopus Indexed Journal" class="img-fluid" title="Scopus Indexed Journal" style="box-shadow: 0px 0px 5px 2px rgb(110, 132, 152);margin: 0px 0px 5px 0px;">
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a href="https://www.scimagojr.com/journalsearch.php?q=100364&amp;tip=sid&amp;exact=no" target="_blank" title="SCImago Journal &amp; Country Rank">
                                <img border="0" src="https://www.scimagojr.com/journal_img.php?id=100364" title="SCImago Journal &amp; Country Rank" style="box-shadow: 0px 0px 5px 2px rgb(110, 132, 152);" class="img-fluid" alt="SCImago Journal &amp; Country Rank"  />
                            </a>

                        </div>
                    </div>
                </div>  

                <h2 class="h4">AIM & SCOPES</h2>
                <div class="_card" bis_skin_checked="1">                            
                    <div class=""  bis_skin_checked="1">
                        <div class="text-justify" bis_skin_checked="1">
                            Journal of Engineering is a peer-reviewed, Open Access journal that publishes original research articles as well as review articles in several areas of engineering. The subject areas covered by the journal are
                            <ul>
                                <li>Electrical Engineering</li>
                                <li>Industrial Engineering</li>
                                <li>Mechanical Engineering</li>
                                <li>Chemical Engineering</li>
                                <li>Civil Engineering</li>
                                <li>Computer Engineering</li>
                                <li>Food Engineering</li>
                                <li>General Engineering & Technology</li>
                                <li>Robotics</li>
                                <li>Bioengineering & Biotechnology</li>
                            </ul> 

                        </div>
                    </div>
                </div>                  
            </div>
            <div class="col-md-9">
                <div style="background-image: url('https://www.stockvault.net/data/2018/12/19/257818/preview16.jpg'); background-repeat: no-repeat;background-size: cover;">
                    <h1 class="text-light ml-4">Sapporo Medical Journal</h1>
                    <div class="p-4">
                        <h2 class="h4 text-white">Journal Overview</h2>
                        <p class="text-justify text-white font-weight-bold">
                            Publication of the journal started in 1974. Its original name was “KKU Engineering Journal”. English and Thai manuscripts were accepted. The journal was originally aimed at publishing research that was conducted and implemented in the northeast of Thailand. It is regarded a national journal and has been indexed in the Thai-journal Citation Index (TCI) database since 2004. The journal now accepts only English language manuscripts and became open-access in 2015 to attract more international readers. It was renamed Engineering and Applied Science Research in 2017. The editorial team agreed to publish more international papers, therefore, the new journal title is more appropriate. The journal focuses on research in the field of engineering that not only presents highly original ideas and advanced technology, but also are practical applications of appropriate technology.
                        </p>
                    </div>
                </div>
                <div class="container">
                    <h2>CURRENT ISSUE</h2>
                    <hr>
                    <div class="row">
                        @if(count($articles)>0)
                        @foreach($articles as $article)
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
                                            <a onclick="view_count_submit('<?php echo $article->id;?>')" href="{{ route('single_article',$article->title_slug)}}" class="btn">See Full</a>
                                        </p>
                                    </div>

                                </div>

                                </div>
                                </div>
                                @endforeach
                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="text-center">
                                        {{$articles->links()}}
                                    </div>
                                </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="_ftco-section">
    <div class="container-fluid">
        <h2>Latest news from our blog</h2>
        <hr>
        <div class="row d-flex">
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded" style="background-image: url('https://colorlib.com/preview/theme/accounting/images/image_1.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">March 31, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded" style="background-image: url('https://colorlib.com/preview/theme/accounting/images/image_1.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">March 31, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20 rounded" style="background-image: url('https://colorlib.com/preview/theme/accounting/images/image_1.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">March 31, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection