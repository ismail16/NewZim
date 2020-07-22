@extends('admin.layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('admin.user-feedback.index')}}">User Message</a></li>
@endsection

@section('title', 'User | Message')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.bootstrap.min.css')}}">
    <style>
        .table-actions-bar .table-action-btn {
            color: #98a6ad;
            display: inline-block;
            width: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            font-size: 20px;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        @if(session()->has('message'))
            <div class="col-lg-12 col-xl-12">
                <div class="card-box">
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Submit Date</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($user_messages as $user_message)
                            <tr>
                                <td class="text-center">{{$loop->index+1}}</td>
                                <td class="text-center">{{$user_message->name}}</td>
                                <td class="text-center">{{$user_message->email}}</td>
                                <td class="text-center">{{$user_message->message}}</td>
                                <td class="text-center">{{$user_message->created_at->format('d M Y')}}</td>
                                <td class="text-center">
                                    @if($user_message->status == 0)
                                        <button class="btn btn-xs bg-red-active"><i class="fa fa-times-circle"></i> Not Seen</button>
                                    @elseif($user_message->status == 1)
                                        <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Seen</button>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if($user_message->status == 0)
                                        <form action="{{route('admin.message_show_admin', $user_message->id)}}" method="post" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-xs btn-danger" type="submit" ><i class="fa fa-eye"></i></button>
                                        </form>
                                    @elseif($user_message->status == 1)
                                        <a href="{{ route('admin.user-message.show',$user_message->id)}}" class="btn btn-xs btn-success">
                                           <i class="fa fa-eye"></i>
                                        </a>
                                    @endif

                                    <a href="#" class="btn btn-xs btn-danger table-action-btn user_message"
                                       data-content="{{$loop->index+1}}"><i
                                                class="fa fa-trash-o"></i></a>

                                    <form id="user_message{{$loop->index+1}}"
                                          action="{{route('admin.user-message.destroy',$user_message->id)}}"
                                          method="post" class="delete"
                                          data-content="{{$user_message->id}}"
                                          style="display: none;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('js/bootbox.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-bs/js/dataTables.bootstrap.min.js')}}"></script>
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
        $(document).on("click", ".user_message", function (e) {
            var index = $(this).data('content');

            bootbox.confirm({
                message: "Do you want to remove this?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-vinndo'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $("#user_message" + index).submit();
                    }
                }
            });
        });
    </script>
@endpush