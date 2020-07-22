@extends('admin.layouts.app')

@section('title', 'Create Submission Timer')

@push('css')

    <link rel="stylesheet" href="{{asset('datetime_picker/bootstrap.min.css')}}">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('datetime_picker/jquery.min.js')}}"></script>
    <style type="text/css">
        .top-buffer {
            margin-top: 50px;
        }
		.bottom-buffer {
            margin-bottom: 50px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function () {

			//DatePicker Example
			$('#datetimepicker').datetimepicker({
                format:'Y-m-d H:i:s'
            });
		});
    </script>

@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Issue Create</h3>
                    <a href="{{route('admin.submission-timer.index')}}" class="btn btn-xs btn-info pull-right"> <i class="fa fa-list"></i> All</a>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Opps! {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="box-body">
                    <form action="{{route('admin.submission-timer.store')}}" role="form"
                          enctype="multipart/form-data" method="post">

                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" name="volume" class="form-control" id="volume" placeholder="Enter volume Ex: 01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="issue">Issue</label>
                                    <input type="text" name="issue" class="form-control" id="issue" placeholder="Enter issue Ex: 01">
                                    {{--                                    <select class="form-control" name="issue">--}}
{{--                                        <option>Select Issue No.</option>--}}
{{--                                        <option value="01">01</option>--}}
{{--                                        --}}{{--<option value="february">February</option>--}}
{{--                                        --}}{{--<option value="march">march</option>--}}
{{--                                        --}}{{--<option value="april">April</option>--}}
{{--                                        <option value="02">02</option>--}}
{{--                                        --}}{{--<option value="june">June</option>--}}
{{--                                        --}}{{--<option value="july">July</option>--}}
{{--                                        --}}{{--<option value="august">August</option>--}}
{{--                                        <option value="03">03</option>--}}
{{--                                        --}}{{--<option value="october">October</option>--}}
{{--                                        --}}{{--<option value="november">November</option>--}}
{{--                                        --}}{{--<option value="december">December</option>--}}
{{--                                    </select>--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option></option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="datetimepicker">Submission Deadline</label>
                                <input id="datetimepicker" name="deadline" type="text" placeholder="Enter deadline" class="form-control" autocomplete="off" required>
                                @if($errors->has('title'))
                                    {{ $errors->title }}
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-md-2">Status: </label>
                            <div>
                                <label class="col-md-2">Inactive: <input type="radio" name="status" value="0"></label>

                            </div>
                            <div>
                                <label class="col-md-2">Active: <input type="radio" name="status" value="1"></label>

                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary  pull-right"><i class="fa fa-plus-circle"></i> Create</button>
                            <a href="{{route('admin.submission-timer.index')}}" class="btn btn-sm btn-default  pull-right" style="margin-right: 5px;">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{--    @parent--}}
    <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('editor1');
            // $('.textarea').wysihtml5();
        })
    </script>

	<link rel="stylesheet" type="text/css" href="{{asset('datetime_picker/jquery.datetimepicker.min.css')}}"/>
    <script src="{{asset('datetime_picker/bootstrap.min.js')}}"></script>
	<script src="{{asset('datetime_picker/jquery.datetimepicker.js')}}"></script>

@endpush
