@extends('admin.layouts.app')

@section('title', 'All Submission list')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>VPN</th>
                            <th>Sys. Country</th>
                            <th width="12%">Author Name</th>
                            <th>Paper ID</th>
                            <th>Paper Title</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Agrement</th>
                            <th width="10%">Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($sl = 1)
                        @foreach($submits as $submit)
                            <tr>
                                <td>{{$sl ++}}</td>
                                <td>
                                    @if($submit->vpn == "Yes")
                                    <button class="btn btn-xs bg-red-active"> Yes</button>
                                    @else
                                    <button class="btn btn-xs bg-green-active"> No</button>
                                    @endif
                                </td>
                                <td>{{$submit->syscountry}}</td>
                                <td>{{$submit->authorname}}</td>
                                <td>{{$submit->paper_id}}</td>
                                <td>{{$submit->ptitle}}</td>
                                <td>{{date('d M Y', strtotime($submit->created_at))}}</td>
                                <td class="text-center">
                                    @if($submit->is_payment == 0 )
                                        <button class="btn btn-xs bg-red-active"><i class="fa fa-times-circle"></i> Not Paid</button>
                                    @elseif($submit->auto_publish == 1)
                                        <button class="btn btn-xs bg-success"><i class="fa fa-check-circle"></i> Free</button>
                                    @else
                                        <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Paid</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($submit->status == 0)
                                        <form action="{{route('admin.approved', $submit->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Want to Approved!')">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-xs btn-success" type="submit" ><i class="fa fa-check"></i></button>
                                        </form>
                                        <form action="{{route('admin.rejected', $submit->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Want to Rejected!')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="submit" ><i class="fa fa-ban"></i></button>
                                        </form>
                                        @if(\App\Models\Author\Submit::where('user_id',$submit->user_id)->count() > 1)
                                        <button type="button" class="btn btn-xs btn-info select-mail" data-toggle="modal" data-target="#modal-mail-{{$submit->id}}"><i class="fa fa-check-circle"></i></button>


                                        <div class="modal fade" id="modal-mail-{{$submit->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="border-radius: 5px;">
                                                    <div class="modal-body">
                                                            <div class="box-header">
                                                                <i class="fa fa-envelope" style="color: orangered;"></i>

                                                                <h3 class="box-title">Acceptance Mail</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>

                                                            </div>
                                                            <div class="box-body">
                                                                <form action="{{ route('admin.customaccept', $submit->id) }}" id="email-multiselect" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div>
                                                                      <textarea class="textarea" placeholder="Message" name="body"
                                                                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                      </textarea>
                                                                    </div>
                                                                    <br>
                                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                                    <button type="submit" class="btn btn-success pull-right" id="sendEmail">Accept
                                                                        <i class="fa fa-arrow-circle-right"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    @elseif($submit->status == 1)
                                        @if($submit->publish == 0)
                                            <button class="btn btn-xs btn-warning"><i class="fa fa-spinner"></i> Accepted</button>
                                            @else
                                            <button class="btn btn-xs bg-green-active"><i class="fa fa-check-circle"></i> Published</button>
                                        @endif
                                    @else
                                        <button class="btn btn-xs bg-red-active"><i class="fa fa-ban"></i> Rejected</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php($agreement = \App\Models\Payagreement::where('submit_id',$submit->id)->first())
                                    @if($agreement)
                                    <a href="/payagreementpaper/{{$agreement->agreement}}" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.editagreement', $agreement->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    @else
                                    <a href="{{route('admin.uploadagreement', $submit->id)}}" class="btn btn-xs btn-primary">
                                        <i class="fa fa-upload"></i>
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.author-submission.edit', $submit->id)}}" class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.author-submission.show', $submit->id)}}" class="btn btn-xs btn-info"> <i class="fa fa-eye"></i> </a>
                                    <form action="{{route('admin.author-submission.destroy', $submit->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Want to delete')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-danger" type="submit" ><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td>
                                   @if($submit->status == 0 && $submit->is_payment==0 &&  $submit->publish == 0)
                                        <a href="{{route('admin.autoPublished', $submit->id)}}" onclick="return confirm('Are you Sure? Want to Auto Published');" class="btn btn-xs btn-danger" style="margin-left: 10px;">
                                            Auto-publish
                                        </a>
                                   @elseif($submit->auto_publish == 1)
                                        <a href="{{route('admin.autoUnpublished', $submit->id)}}" onclick="return confirm('Are you Sure? Want to Auto Unpublished');" class="btn btn-xs btn-danger" style="margin-left: 10px;">
                                            Auto-Unpublished
                                        </a>
                                   @endif
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
            });
            $('.select-mail').on('click', function (e) {
                // $("#modal-mail").show('modal');
                var form = this;
            })
        })


    </script>
@endpush
