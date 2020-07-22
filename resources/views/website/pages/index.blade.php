@extends('website.layouts.master')

@section('title', 'Sapporo Medical Journal | Sapporo Med. J.')

@section('content')
    <section class="_ftco-section _ftco-no-pt">
        <div class="container">
            <div class="row d-flex no-gutters">
                <!-- <div class="col-md-12">
                    <img src="https://www.balimedicaljournal.org/plugins/themes/discovery/img/home-banner.png" class="img-fluid">
                </div> -->
                <div class="col-md-12 bg-light p-2">
                    <h1>Sapporo Medical Journal</h1>
                    <div class="">
                        <h2 class="h4">Journal Overview</h2>
                        <p class="text-justify">
                            Sapporo Medical Journal is an open access, monthly, peer reviewed International Medical Journal with focuses on publishes research conducted in all fields of medical, medicine. There is no restriction on the length of research papers and reviews, although authors are encouraged to be concise. Sapporo Medical Journal is a scopus indexed International Medical Journal that wants to publish original articles, research articles, review articles with top-level work from all areas of Medicine, General Medicine, Medical Science Research and their application including Aetiology, bioengineering, biomedicine, cardiology, chiropody etc.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 bg-light p-2">
                    <div class="content">
                         <h2 class="h4">About Journal</h2>
                        <div class="text-center row pt-1 mb-2" >
                            <div class="col-6 pl-4 pr-1 ">
                                <a href="https://www.scopus.com/sourceid/100364" title="Source details" target="_blank">
                                    <img src="{{ asset('images/scopus.png')}}" alt="Scopus Indexed Journal" class="img-fluid" title="Scopus Indexed Journal" style="box-shadow: 0px 0px 5px 2px rgb(110, 132, 152);margin: 0px 0px 5px 0px;">
                                </a>
                            </div>
                            <div class="col-6 pr-4 pl-1">
                                <a href="https://www.scimagojr.com/journalsearch.php?q=100364&amp;tip=sid&amp;exact=no" target="_blank" title="SCImago Journal &amp; Country Rank">
                                    <img border="0" src="https://www.scimagojr.com/journal_img.php?id=100364" title="SCImago Journal &amp; Country Rank" style="box-shadow: 0px 0px 5px 2px rgb(110, 132, 152);" class="img-fluid" alt="SCImago Journal &amp; Country Rank"  />
                                </a>

                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-8 bg-light p-2">
                     <h2 class="h4">AIM & SCOPES</h2>
                    
                    <div class="card" bis_skin_checked="1">                            
                        <div class="container-fluid" style="background-color: #fff;" bis_skin_checked="1">
                        <div class="text-justify" bis_skin_checked="1">
                            <span class="badge badge-light m-1"> Medicine</span>  
                            <span class="badge badge-light m-1"> Microbiology </span>     
                            <span class="badge badge-light m-1"> Biochemistry</span>    
                            <span class="badge badge-light m-1"> Pharmacology</span>
                            <span class="badge badge-light m-1"> Pathology</span>   
                            <span class="badge badge-light m-1"> Forensic medicine</span>   
                            <span class="badge badge-light m-1"> Internal Medicine</span>   
                            <span class="badge badge-light m-1"> Physiology</span>  
                            <span class="badge badge-light m-1"> Anatomy</span> 
                            <span class="badge badge-light m-1"> Obstetrics and Gynecology</span>
                            <span class="badge badge-light m-1"> Radiology</span>   
                            <span class="badge badge-light m-1"> Community Medicine</span>
                            <span class="badge badge-light m-1"> Otorhinolaryngology</span> 
                            <span class="badge badge-light m-1"> Infectious Diseases</span>
                            <span class="badge badge-light m-1"> General Surgery</span> 
                            <span class="badge badge-light m-1"> Cancer research</span> 
                            <span class="badge badge-light m-1"> Pulmonary</span>
                              <span class="badge badge-light m-1"> Obstetrics and Gynecology</span>
                            <span class="badge badge-light m-1"> Radiology</span>   
                            <span class="badge badge-light m-1"> Community Medicine</span>
                            <span class="badge badge-light m-1"> Otorhinolaryngology</span> 
                            <span class="badge badge-light m-1"> Infectious Diseases</span>
                            <span class="badge badge-light m-1"> General Surgery</span> 
                            <span class="badge badge-light m-1"> Cancer research</span> 
                            <span class="badge badge-light m-1"> Pulmonary</span>
                              <span class="badge badge-light m-1"> Obstetrics and Gynecology</span>
                            <span class="badge badge-light m-1"> Radiology</span>   
                            <span class="badge badge-light m-1"> Community Medicine</span>
                            <span class="badge badge-light m-1"> Otorhinolaryngology</span> 
                            <span class="badge badge-light m-1"> Infectious Diseases</span>
                            <span class="badge badge-light m-1"> General Surgery</span> 
                            <span class="badge badge-light m-1"> Cancer research</span> 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>
    <section class="_ftco-section _bg-light _ftco-no-pt mt-2">
        <div class="container">
            <h2>CURRENT ISSUE</h2>
            <hr>
            <div class="row">
                @if(count($articles)>0)
                    @foreach($articles as $article)
                    <div class="col-md-12 services align-self-stretch px-4 ftco-animate">
                        <div class="d-block">
                            <div class="card-body">
                                    <!-- <h3 class="heading">ORIGINAL ARTICLE</h3> -->
                                <div class="media-body">
                                    <strong>Title:</strong> <a href="">{{ $article->ptitle }}</a>
                                    <p>Author: <span class="badge badge-light">Indonesia</span>
                                    <span class="badge badge-light">Indonesia</span>
                                    <span class="badge badge-light">Indonesia</span>
                                    <span class="badge badge-light">Indonesia</span></p>

                                    <p><strong>Abstract:</strong>  Long-term stroke risk factors may lead to inflammation of endothelial vessels characterized by migration of macrophages and T-lymphocytes in blood vessel walls by releasing Interleukin-18 (IL-18) cytokines and causing changes in Mean Platelet Volume (MPV) values. This study aims to determine the relationship between IL-18 and MPV levels with ischemic stroke event in Sanglah General Hospital Denpasar.
                                    Methods: A matched-pair case-control study design was conducted in this study. The number of stroke and control samples were 33 people, respectively, and the dependent variable was an ischemic stroke, following MPV and IL-18 as dependent variables. Free T-2 sample test used to compare MPV in each group while the Mann-Whitney test used to compare the interleukin levels of the two groups. Data were analyzed using SPSS version 20 for Windows. <a href="" class="btn">See Full</a></p>
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
    </section>
    <section class="_ftco-section">
        <div class="container">
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