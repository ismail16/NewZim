
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset='utf-8'>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ URL::asset('frontend_assets/css/main.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('frontend_assets/css/chosen.min.css')}}">
  <!-- <link rel="stylesheet" href="{{ URL::asset('frontend_assets/css/font-awesome.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('frontend_assets/css/jquery.multiselect.css')}}">
  <style>
    .IEcheck_input {
      display:none;
    }
    .IEcheck_button {
      display:inline-block;
    }
  </style>
  @stack('css')

</head>
<body>
  <a name="top"></a>
  <header>
    <div id="topmenu">
      <ul >
        <li class="user-quick-cmd">
          <a href="{{route('authorlogin')}}" title="Login" class="_active" >Login</a>
          <a href="{{route('authorregister')}}" title="Register">Register</a>
        </li>
        <li>
          <a href="/" rel="noopener noreferrer" title="SMJ" style="padding-left: 10px;">SMJ</a>
        </li>
        <li class='drop-down'>
          <a href="#" target="_blank" rel="noopener noreferrer" title="Information Guidelines">Information &amp; Guidelines</a>
          <div class="drop-down-wrapper" style="width: 440px;">
            <div class="columns right-border" style="width: 134px;">
              <ul>
                <li>
                  <a href="{{ route('authors')}}" title="for Authors">For Authors</a>
                </li>
                <li>
                  <a href="{{ route('editors')}}" title="for editors">For Editors</a>
                </li>

                <li>
                  <a href="{{ route('reviewers')}}" title="Publication Ethics">Publication Ethics</a>
                </li>

                <li>
                  <a href="{{ route('editorial_process')}}">Editorial Process</a>
                </li>

              </ul>
            </div>
            <div class="columns" style="padding-left: 10px;">
              <ul>
                <li>
                  <a href="{{ route('apc')}}">Article Processing Charges</a>
                </li>
                <li>
                  <a href="#">Payment Procedure</a>
                </li>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
        </li>

        <li><a href="/about">About</a></li>
      </ul>
    </div>
  </header>
  <div id="scrollbottom" title="return bottom" class="tooltip-info">
    <img src="/bundles/mdpisusy/img/icon/bottom.png?c4318c636721eec3" alt="Bottom">
  </div>

  @yield('content')

  <div id="footer">
    <div id="copyright">&copy;  © 2018-2019 SMJ (Texas, USA) unless otherwise stated</div>
  </div>
  @stack('scripts')

</body>
</html>
