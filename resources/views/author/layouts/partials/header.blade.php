<header class="main-header" style="position: fixed; width: 100%;background-color: #010149;">
    <nav class="navbar navbar-default" style="background-color: #010149;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('author.dashboard')}}" title="Sapporo Medical Journal" style="padding: 7px 0px;">
                    <img src="{{ asset('images/logo.png')}}" title="Sapporo Medical Journal" alt="Sapporo Medical Journal" class="img-fluid">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="btn {{Request::is('author/paper-submission')? 'nav_link_active':''}}"
                            href="{{route('author.paper-submission.index')}}">
                            <i class="fa fa-fw fa-th-list"></i> All Submission
                        </a>
                    </li>

                    <li>
                        <a class="btn {{Request::is('author/paper-submission/create')? 'nav_link_active':''}}"
                            href="{{route('author.paper-submission.create')}}">
                            <i class="fa fa-upload"></i> New Submit
                        </a>
                    </li>

                    <li>
                        <a class="btn {{Request::is('paper_submission_guideline')? 'nav_link_active':''}}"
                            href="{{ route('paper_submission_guideline') }}" target="_blank">
                            <i class="fa fa-info-circle"></i> <span>Submission Documentation</span>
                        </a>
                    </li>

                    <li>
                        <a class="btn {{Request::is('author/CopyrightAgreementForm.pdf')? 'nav_link_active':''}}"
                            href="{{ asset('CopyrightAgreementForm.pdf') }}" target="_blank">
                            <i class="fa fa-copyright"></i> <span>Copyright Agreement form</span> <i
                                class="fa fa-download"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->image)
                            <img src="{{asset('images/author_profile/'.Auth::user()->image)}}" class="user-image"
                                alt="User Image">
                            @else
                            <img src="{{asset('images/default.png')}}" class="user-image" alt="User Image">
                            @endif
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="text-center">
                                <h4>{{ Auth::user()->firstname }}</h4>
                                <h5>Since {{ date('d M Y', strtotime(Auth::user()->created_at)) }}</h5>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('author.profile.show', Auth::user()->id)}}"
                                        class="btn btn-primary btn-sm">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
    .main-header .navbar {
        margin-left: 0px !important;
    }

    .navbar-nav>.user-menu>.dropdown-menu {
        width: 160px !important;
        margin-top: 15px !important;
    }

    .skin-black-light .main-header .navbar .nav>li>a {
        color: #fff;
        font-weight: bold;
        background-color: #040498;
        padding: 7px;
        margin: 10px;
    }

    .skin-black-light .main-header .navbar .nav>li>a:hover {
        color: red !important;
    }

    .navbar-right>li>a {
        border-left: 0 !important;
    }

    .user>.dropdown-toggle {
        background-color: transparent !important;
    }
    .nav_link_active{
        color: #e60000 !important;
        background-color: #ffffff !important;
    }
    </style>
</header>
}