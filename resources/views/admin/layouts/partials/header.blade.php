<header class="main-header">
    <a href="" class="logo" style="position: fixed !important;">
        <span class="logo-mini">
            <img data-cfsrc="{{asset('images/logos/jhhj.png')}}"alt="JHMJ" title="JHMJ Open Access Journals" data-cfstyle="height: 30px;" style="height: 30px;" src="{{asset('images/logos/jhhj.png')}}">
        </span>
        <span class="logo-lg">Dashboard</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="{{route('admin.user-message.index')}}">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{ \App\Models\Contact_sent::where('status', 0)->count() }}</span>
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="{{route('admin.author-submission.index')}}" >
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ \App\Models\Author\Submit::where('status', 0)->count() }}</span>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('images/default.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('images/default.png')}}" class="img-circle" alt="User Image">
                            <p>
                                {{Auth::user()->name}} - Admin
                                <small>Since Jan. 2019</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
