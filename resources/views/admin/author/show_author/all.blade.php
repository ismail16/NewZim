@extends('admin.layouts.app')

@section('title', 'All Author list')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Institution</th>
                                <th>Address</th>
                                <th>VPN</th>
                                <th>Sys. Country</th>
                                <th> Reg. Date</th>
                                <th> Discount </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($sl = 1)
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$sl ++}}</td>
                                    <td>{{$author->firstname}} {{$author->lastname}}</td>
                                    <td>{{$author->email}}</td>
                                    <td>{{$author->department}}</td>
                                    <td>{{$author->institution}}</td>
                                    <td>{{$author->address}}</td>
                                    <td>
                                        @if($author->vpn == "Yes")
                                        <button class="btn btn-xs bg-red-active"> Yes</button>
                                        @else
                                        <button class="btn btn-xs bg-green-active"> No</button>
                                        @endif
                                    </td>
                                    <td>{{$author->syscountry}}</td>
                                    <td>{{date('d M Y', strtotime($author->created_at))}}</td>
                                    <td>{{$author->discount}} %</td>
                                    <td>
                                        <a class="btn btn-xs btn-success" href="{{route('admin.show-author.edit', $author->id)}}"><i class="fa fa-fw fa-edit"></i></a>
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

@endsection

@push('scripts')
    <script src="{{asset('admin/bower_components/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endpush
