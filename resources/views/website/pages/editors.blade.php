@extends('website.layouts.master')
@section('title')
Editorial Board | Sapporo Medical Journal
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3 text-justify">
                <h5 class="rounded-0 font-size-22">Sapporo Medical Journal Editors-Panel</h5>
                <div class="card-body">
                <div class="row mt-2">
                    @foreach($editors as $editor)
                    <div class="col-md-6">
                        <div class="pl-4 pr-4">
                            <div class="media well" style="">
                                <div class="media-body">
                                    <div><strong><a href="#">{{ $editor->name }}</a></strong></div>
                                    <div>E-mail: <strong>{{ $editor->email }}</strong></div>
                                    <div><strong>{{ $editor->editor_position }}</strong></div>
                                    <div class="text-justify">{!!  $editor->description  !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="text-center">
                            {{$editors->links()}}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-3 bg-light p-2">
            @include('website.partials.sidebar_web')              
        </div>
    </div>
</div>

@endsection
