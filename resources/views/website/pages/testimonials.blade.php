@extends('website.layouts.master')

@section('title', 'All Testimonials')

@push('css')

@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">Testimonials</h5>
                <div class="card-body">
                 @if(count($testimonials) > 0)
                        @foreach($testimonials as $testimonial)
                            <div class="row" style="padding: 20px;">
                                <div class="col-12 col-md-2">
                                    <img class="img-fluid" style="border-radius: 50%; border: 3px solid blue; height: 100px; width: 100px;" src="{{asset('images/testimonials/'.$testimonial->photo)}}" alt="{{$testimonial->name}}" title="{{$testimonial->name}}">
                                </div>
                                <div class="col-12 col-md-10">{!! $testimonial->description !!}
                                        <span> <strong>{{$testimonial->name}},</strong> {{$testimonial->designation}}, {{$testimonial->institution}}</span> </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>



@endsection

@push('scripts')

@endpush