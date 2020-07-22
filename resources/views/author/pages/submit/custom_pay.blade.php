@extends('author.layouts.app')

@section('title', 'Custom Payment')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .displaynone{
            display: none;
        }
    </style>
@endpush

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0px;">
            <div class="box box-danger">
                    
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (Session::has('danger'))
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('danger') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-info text-center" style="color: #8a6d3b !important;background-color: #fcf8e3 !important; border-color: #faebcc; padding : 10px; margin-top: 15px;">
                            <div>System will Accept any payment method showing below <br>
                                (Credit/Debit Card, American Express, Stripe, or anyother dual currency Card) <br>
                                If have any problem or query please feel free to 
                                contact us by Email : <br> 
                                <i class="fa fa-envelope"></i> 
                                <b>support@maejournal.com</b>
                            </div>       
                        </div>
                    </div>

                    @if($paper->is_payment == 0)

                    <div class="row" style="margin: 0px 0px 17px 0px !important;">
                        <div class="col-md-9 pl-2 pr-2">
                            <input type="text" id="purpose" name="purpose" class="form-control" placeholder="A short discription of why you pay? (max 150 character)" required>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Amount in USD" min="1" required>
                        </div>
                    </div>
                    <div class="row displaynone" style="margin: 0px 0px 17px 0px !important;" id="displaynone">
                        <div class="col-md-5">
                            <div id="paypal-button-container"></div>
                        </div>
                        <div class="col-md-1 text-center" style="margin-bottom: 15px;">
                            <button class="btn btn-info">OR</button>
                        </div>
                        <div class="box-body col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary box-solid">
                                        <div class="box box-primary" style="margin-bottom: 0px !important;">
                                        </div>
                                        <div class="credit-card-box">
                                            <div class="panel-heading" style="padding: 0px 15px !important;">
                                                <div class="row display-tr" >
                                                    <div class="display-td text-success" style="float: left; margin-top: 12px; padding-left: 17px; font-weight: bold;">
                                                        </div>
                                                    <div class="display-td" >
                                                        <img class="img-responsive pull-right" src="{{ asset('admin/card.png') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Pk_test: pk_test_w69wUfKAEpxZmKoNzMWibACW00tOQ3ye4K-->
                                            <!--Pk_live: pk_live_Ndk2iQs46YAmmVSAe6UGHSKx00dsEuSiQ9-->
                                            <div class="panel-body" style="padding: 0px 15px 15px 15px !important;">
                                                <form role="form" action="{{ route('author.stripe_custom') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_live_Ndk2iQs46YAmmVSAe6UGHSKx00dsEuSiQ9" id="payment-form">
                                                    @csrf
                                                    <input type="hidden" name="paper_id" value="{{$paper->paper_id}}">
                                                    <input type="hidden" id="samount" name="price">
                                                    <input type="hidden" id="spurpose" name="purpose">
                                                    <div class='form-row row'>
                                                        <div class='col-xs-12 form-group required'>
                                                            <label class='control-label'>Card holder Name</label>
                                                            <input class='form-control' size='4' type='text' name="holder_name">
                                                        </div>
                                                    </div>

                                                    <div class='form-row row'>
                                                        <div class='col-xs-12 form-group card required'>
                                                            <label class='control-label'>Card Number</label>
                                                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                                        </div>
                                                    </div>

                                                    <div class='form-row row'>
                                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                            <label class='control-label'>CVC</label>
                                                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                            <label class='control-label'>Expiration Month</label>
                                                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                            <label class='control-label'>Expiration Year</label>
                                                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                                        </div>
                                                    </div>

                                                    <div class='form-row row'>
                                                        <div class='col-md-12 error form-group hide'>
                                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <button class="btn btn-primary btn-block" type="submit">Pay Now </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    @else
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            <h4 class="text-center text-bold">You have already paid against this {{$paper->paper_id}} paper ID</h4>
                        </div>
                    </div>
                    @endif
                    <div class="box-footer col-md-12">
                        <a href="{{route('author.paper-submission.index')}}" class="btn btn-sm btn-primary pull-left"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        <b style="color: green;" class="pull-right"> Your Security is our first priority. Always secured.</b>
                    </div>
                    @php($paperID = $paper->paper_id)
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
    <!-- Test key -->
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AXQBUWLfBqyfKGhCWYXXIXbJxHQmBLZB8g33nDWM6QM93IrkYsq5yYxJOXbZ6_MkwZ7qWAk3ORaOXK_X"></script> -->
    <!-- Live Key -->
    <script src="https://www.paypal.com/sdk/js?client-id=AWba8k0FmIykbYm4ybwSQwj3BehjrQEjCv57qOBTwKJ6nsZmGN-VNT3Q4wKc5Ci9DbpEl9ufqlCTK_0l"></script>
    <script>
        $(function(){
            $("#amount").attr('disabled','true');
            $("#purpose").focus();
        });
        $("#purpose").keyup(function(){
            let purpose = $(this).val();
            $("#spurpose").val(purpose);
            if(purpose.length > 0){
                $("#amount").removeAttr('disabled');
            }else{
                $("#amount").attr('disabled','true');
            }
        });
        $("#amount").keyup(function(){
            let price = $(this).val();
            $("#samount").val(price);
            if(price > 0){
                $("#displaynone").removeClass('displaynone');
            }else{
                $("#displaynone").addClass('displaynone');
            }
        });
        paypal.Buttons({
            createOrder: function(data, actions) {
                // Set up the transaction
                var p = $("#amount").val();
                return actions.order.create({

                    purchase_units: [{
                        amount: {
                            value: p,
                            currency: 'USD'
                        }
                    }],

                });
            },
            onApprove: function(data, actions) {

                // Capture the funds from the transaction
                return actions.order.capture().then(function(details) {
                    // Show a success message to your buyer
                    var paperID = '{{$paperID}}';
                    var purpose = $("#purpose").val();
                    $.ajax({
                        url: "{{route('author.paypal_custom')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {cdetails:details, purpose: purpose, paper_id: paperID, _token: '{{csrf_token()}}'},
                        success: function (res) {
                            console.log(res);
                            Swal.fire('Transaction completed by ' + details.payer.name.given_name + '! Please check your mail');
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // res ponse token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

@endpush