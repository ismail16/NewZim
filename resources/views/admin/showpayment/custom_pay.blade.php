@extends('admin.layouts.app')

@section('title', 'Stripe Payment')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.responsive.css')}}">
    <style>
        .tab-content {
            padding: 10px;
            border-left: 1px solid #DDD;
            border-bottom: 1px solid #DDD;
            border-right: 1px solid #DDD;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <div class="box-header">
                    <a href="{{route('admin.showpayment')}}" class="btn btn-xs btn-info pull-right"><i class="fa fa-cc-paypal"></i> Paypal</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Paper ID</th>
                            <th>Payment Date</th>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stripes as $stripe)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$stripe->user_id}}</td>
                                <td>{{$stripe->user->firstname}}</td>
                                <td>{{$stripe->paper_id}}</td>
                                <td>{{date('d M Y', strtotime($stripe->created_at))}}</td>
                                <td>{{$stripe->payment_id}}</td>
                                <td class="text-right"><span style="padding-right: 15px;">{{$stripe->amount}}</span></td>
                                <td class="text-center">
                                    @if($stripe->pay_type)
                                    <button class="btn btn-xs btn-warning">Stripe</button>
                                    @else
                                    <button class="btn btn-xs btn-primary">Paypal</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>

@endsection

@push('scripts')
    <script src="{{asset('admin/bower_components/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-bs/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#example1').DataTable({
                "responsive": true,
                "bAutowidth": true,
            });
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });
    </script>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

    <script>
        $(document).on("click", ".on_click", function (e) {
            var index = $(this).data('content');

            bootbox.confirm({
                message: "Are you sure?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn btn-xs btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn btn-xs btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $("#on_click" + index).submit();
                    }
                }
            });
        });
    </script>
@endpush
