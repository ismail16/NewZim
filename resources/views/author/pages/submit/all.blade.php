@extends('author.layouts.app')

@section('title', 'All Submission')

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
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="4%">#SL</th>
                                <th width="12%">Paper ID</th>
                                <th width="40%">Paper Title</th>
                                <th width="10%">Date</th>
                                <th width="10%">Status</th>
                                <th width="12%">Payment(APC)</th>
                                <th width="12%">Agreement</th>
                                <th width="12%">Action</th>
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
                                                @elseif($submit->auto_publish == 1)
                                                    <button class="btn btn-xs bg-success"><i class="fa fa-check-circle"></i> Free</button>
                                                @else
                                                    <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Paid</button>
                                                @endif
                                            @else
                                                <button class="btn btn-xs bg-red-active">Not Applicable</button>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($submit->is_payment == 1)
                                            @php($agreement = \App\Models\Payagreement::where('submit_id',$submit->id)->first())
                                            @if($agreement)
                                            <a href="/payagreementpaper/{{$agreement->agreement}}" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>View</a>
                                            @else
                                            <a href="{{route('author.uploadagreement', $submit->id)}}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-upload"> Upload</i>
                                            </a>
                                            @endif
                                        @else

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
            </div>
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
