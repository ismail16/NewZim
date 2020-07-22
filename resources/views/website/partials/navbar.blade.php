<div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-wrap">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <a class="navbar-brand" href="index.html">
                                    <img src="{{ asset('images/logo.png')}}">
                                </a>
                            </div>
                            <div class="col-md-6 d-flex justify-content-md-end">
                                <a href="#" class="d-flex align-items-center justify-content-center p-2 text-white"><i class="fa fa-key"> </i>  Register</a>
                                <a href="#" class="d-flex align-items-center justify-content-center p-2 text-white"><i class="fa fa-key"> </i>  Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            
            

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('about_us') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ route('paper_submission_guideline') }}" class="nav-link"> Submission Docs</a></li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
                        <div class="dropdown">
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('apc') }}">Article Processing Charges</a>
                            <a class="dropdown-item" href="{{ route('open_access') }}">Open Access Policy</a>
                            <a class="dropdown-item" href="{{ route('authors') }}">For Authors</a>
                            <a class="dropdown-item" href="{{ route('editors') }}">Editorial Board</a>
                            <a class="dropdown-item" href="{{ route('faq') }}">FAQ</a>
                          </div>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('contact_us') }}" class="nav-link">Contact</a></li>
                </ul>
                
            </div>

            <form action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control border" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>


        </div>
    </nav>