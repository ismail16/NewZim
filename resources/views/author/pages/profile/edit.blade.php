@extends('author.layouts.app')

@section('title', 'Edit Profile')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">            
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if(Auth::user()->image)
                            <img src="{{asset('images/author_profile/'.Auth::user()->image)}}" class="profile-user-img img-responsive img-circle" alt="User Image">
                        @else
                            <img src="{{asset('images/default.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image">
                        @endif
                        <h3 class="profile-username text-center">{{Auth::user()->firstname }} {{Auth::user()->lastname}}</h3>
                        <p class="text-muted text-center">{{Auth::user()->role->name}}</p>
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
                        <p class="text-muted">
                            {{Auth::user()->department}}
                            @if(Auth::user()->institution != null)
                                in
                            @endif
                            {{Auth::user()->institution}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">{{Auth::user()->address}}</p>
                        <a class="btn btn-primary btn-block" href="{{route('author.profile.show', Auth::user()->id)}}">
                            <i class="fa fa-fw fa-user"></i>Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="box box-info">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">Update Your Profile</h3>
                    </div>
                    <form class="form-horizontal" action="{{route('author.profile.update', $profile->id)}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}                    
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <select name="title" id="" class="form-control">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Mst.">Mst.</option>
                                        <option value="Mis.">Mis.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">First Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="firstname" value="{{ $profile->firstname }}" class="form-control" id="inputFirstName3" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="middlename" value="{{ $profile->middlename }}" class="form-control" id="inputMiddleName3" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Last Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="lastname" value="{{ $profile->lastname }}" class="form-control" id="inputLastName3" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input id="useremail" value="{{ $profile->email }}" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Institution</label>
                                <div class="col-sm-9">
                                    <input type="text" name="institution" value="{{ $profile->institution }}" class="form-control" id="inputInstitution3" placeholder="Institution">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" name="department" value="{{ $profile->department }}" class="form-control" id="inputDepartment3" placeholder="Department">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id="inputAddress3" placeholder="Address">{{ $profile->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">User ID</label>
                                <div class="col-sm-9">
                                    <input id="useremail" value="{{ $profile->email }}" class="form-control form-control-sm" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input id="useremail" name="password" class="form-control form-control-sm"placeholder="Enter password If want to change" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-sm-3 control-label"> Profile Image</label>
                                <div class="col-sm-9">
                                    @if(Auth::user()->image)
                                        <img id="imageBrowsLive" src="{{asset('images/author_profile/'.$profile->image)}}" style="width: 90px;">
                                    @else
                                        <img id="imageBrowsLive" src="{{asset('images/default.png')}}"  style="width: 90px;">
                                    @endif
                                    <input id="image" class="form-control form-control-sm" name="image" type="file" onchange="readliveImagebrows(this);" width="90">
                                </div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{route('author.profile.show', $profile->id)}}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')

@endpush