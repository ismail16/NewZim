@extends('website.layouts.master')

@section('title', 'All Testimonials')

@push('css')

@endpush

@section('content')

    <div class="container mt-4 mb-4">
        <div class="card">
            <h6 class="card-header _bg-teal-500 mt-0" style="background-color: #04386b; color:#fff;">Testimonials</h6>
            <div class="pt-1 pr-3 pl-3">
                <div class="row mb-2">
                    <div class="col-md-12">
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
        </div>
    </div>

@endsection

@push('scripts')

@endpush