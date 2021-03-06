@extends('admin.layouts.app')

@section('title', $title.' Agreement')

@push('css')
    <link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-heading')
    Author Emails
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="alert alert-warning">
                        <h4>{{$title}} Agreement Paper Against Paper ID: {{$paper->paper_id}}</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (\Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    @if (\Session::get('failure'))
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('failure') }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('message'))
                        <div class="alert alert-{{ Session::get('level') }} m-t-20">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    <form id="point_upload_form" method="post" enctype="multipart/form-data" action="{{ $title == 'Upload' ? route('admin.uploadnow'): route('admin.editnow',$agreement->id)}}">
                        <div class="row m-t-20">
                            {{ csrf_field() }}
                            <input type="hidden" name="submit_id" value="{{$paper->id}}">
                            <div class="col-md-12">
                                <label for="file" class="col-form-label">{{$title}} Agreement</label>
                                <input name="agreement" required type="file" class="dropify" id="file">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <a href="{{route('admin.email-excel.index')}}" class="btn btn-danger"> <i
                                            class="fa fa-arrow-circle-left"></i> Back</a> -->
                                <button class="btn btn-success pull-right" id="upload" style="margin-right: 5px;">
                                    <span>{{$title}} Now </span> <i class="fa fa-upload m-l-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--    <script src="{{asset('admin/pages/jquery.dashboard_3.js')}}"></script>--}}
    <script src="{{asset('js/dropify.min.js')}}"></script>
    <script src="{{asset('js/notifyjs/js/notify.js')}}"></script>
    <script src="{{asset('js/notifications/notify-metro.js')}}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
            }
        });

    </script>

@endpush
