<footer class="footer">
        <div class="container-fluid px-lg-5">
            <div class="row">
                <div class="col-md-8 py-5">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">Contact us</h2>
                            <ul class="ftco-footer-social p-0">
                                <h4 class="text-white">Mail to us</h4>
                                <li class="text-white">support@maejournal.com</li> <br>
                                <li class="text-white">admin@maejournal.com</li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10">
                                    <div class="row">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <h2 class="footer-heading">Information</h2>
                                            <ul class="list-unstyled">                        
                                                <li>
                                                    <a href="{{ route('apc') }}" class="py-1 d-block" title="Article Processing Charges">Article Processing Charges</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('open_access') }}" class="py-1 d-block" title="Open Access Policy">Open Access Policy</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('terms_condition') }}" class="py-1 d-block" title="Terms and Conditions">Terms and Conditions</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('privacy_policy') }}" class="py-1 d-block" title="Privacy Policy">Privacy Policy</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <h2 class="footer-heading">Discover</h2>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a title="Information For Authors" href="{{ route('authors') }}" title="Information For Authors">Information For Authors</a>
                                                </li>
                                                <li>
                                                    <a title="Information Editorial Board" href="{{ route('editors') }}" title="Editorial Board">Editorial Board</a>
                                                </li>
                                                <li>
                                                    <a title="Refund Ploicy" href="{{ route('refund_policy') }}" title="Refund Ploicy">Refund Ploicy</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('create.feedback') }}" title="User Feedback">User Feedback</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-md-5">
                        <div class="col-md-12">
                            <p class="copyright">
                                Copyright &copy; 2020 All rights reserved | Sapporo Medical Journal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-md-5 py-4 aside-stretch-right pl-lg-5">
                    <h2 class="footer-heading">Sapporo Medical Journal</h2>
                    <form action="#" class="form-consultation">
                        <div class="form-group">
                            <input type="text" id="subscribe_name" name="name" placeholder="Name" class="form-control mt-1">
                        </div>
                        <div class="form-group">
                            <input type="email" id="subscribe_email" name="email" placeholder="Email" class="form-control mt-1">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control submit px-3">Send A Message</button>
                        </div>
                    </form>

                    <!-- <h5 class="h4"></h5>
                    <div class="border p-2">
                        <div class="form-group">
                            <label for="subscribe_name" class="d-none"></label>
                            <input type="text" id="subscribe_name" name="name" placeholder="Name" class="form-control mt-1">

                            <label for="subscribe_email" class="d-none"></label>
                            <input type="email" id="subscribe_email" name="email" placeholder="Email" class="form-control mt-1">
                        </div>
                        <button onclick="user_subscription()" title="Subscribe Sapporo Medical Journal news" class="btn btn-primary text-right"> Subscribe </button>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
    <script src="{{ asset('frontend_assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery-migrate-3.0.1.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery.stellar.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery.animateNumber.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/scrollax.min.js')}}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/google-map.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/main.js')}}" type="text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="19aa31d4fbf4233411be92d0-|49" defer=""></script></body>
    </html>