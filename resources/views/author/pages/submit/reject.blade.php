@extends('author.layouts.app')

@section('title', 'Rejected Submission!')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0px;">

        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Paper ID</th>
                            <th>Paper Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submits as $submit)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$submit->paper_id}}</td>
                                <td>{{$submit->ptitle}}</td>
                                <td>{{date('d M Y', strtotime($submit->created_at))}}</td>
                                <td class="text-center">
                                    @if($submit->status == 0)
                                        <button class="btn btn-xs bg-yellow-active"><i class="fa fa-spinner"></i> Pending</button>
                                    @elseif($submit->status == 1)
                                        @if($submit->publish == 0)
                                            <button class="btn btn-xs bg-light-blue"><i class="fa fa-check"></i> Accepted</button>
                                        @else
                                            <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Published</button>
                                        @endif
                                    @else
                                        <button class="btn btn-xs bg-red-active"><i class="fa fa-ban"></i> Rejected</button>
                                    @endif
                                </td>
                                <td class="text-center">

                                    @if($submit->status == 0 )
                                        <button class="btn btn-xs bg-orange-active">Wait for Approved</button>
                                    @else
                                        @if($submit->status == 1)
                                            @if($submit->is_payment == 0)
                                                <b style="color: red">Unpaid!</b>
                                                <a href="{{route('author.pay', $submit->id)}}" class="btn btn-xs bg-aqua-gradient" style="font-weight: bolder !important;" target="_blank"><i class="fa fa-credit-card"></i> Pay Now(APC)</a>
                                            @else
                                                <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Paid</button>
                                            @endif
                                        @else
                                            <button class="btn btn-xs bg-red-active">Not Applicable</button>
                                        @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('author.paper-submission.edit', $submit->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

                                    <a href="{{route('author.paper-submission.show', $submit->id)}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    </div>
</div>



@endsection

@push('scripts')

    <script src="{{asset('admin/bower_components/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
        })
    </script>

@endpush
