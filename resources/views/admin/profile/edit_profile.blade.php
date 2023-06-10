@extends('admin.includes.layout', ['breadcrumb_title' => 'Profile Settings'])
@section('title', 'Profile Settings')
@section('main-content')
    <div class="card-body">

        <div class="page-content" style="margin-top:-75px">
            <div class="container-fluid">

                <div class="position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg profile-setting-img">
                        {{-- <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt=""> --}}
                        <div class="overlay-content">
                            <div class="text-end p-3">
                                {{-- <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                    <input id="profile-foreground-img-file-input" type="file"
                                        class="profile-foreground-img-file-input">
                                    <label for="profile-foreground-img-file-input"
                                        class="profile-photo-edit btn btn-light">
                                        <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                    </label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card mt-n5">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                        <img src="{{ asset(Auth::user()->pic ?? 'assets/images/users/avatar-1.jpg')}}"
                                            class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                            alt="image">
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" type="file"
                                               name="pic" disabled class="profile-img-file-input">
                                            <label for="profile-img-file-input"
                                                class="profile-photo-edit avatar-xs">
                                                {{-- <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span> --}}
                                            </label>
                                        </div>
                                    </div>
                                    <h5 class="fs-16 mb-1">{{Auth::user()->first_name}}</h5>
                                    <p class="text-muted mb-0">{{Auth::user()->roles[0]->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card mt-xxl-n5">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                            role="tab">
                                            <i class="fas fa-home"></i> Personal Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                            <i class="far fa-user"></i> Change Password
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                            <i class="far fa-envelope"></i> Experience
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab">
                                            <i class="far fa-envelope"></i> Privacy Policy
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <form action="{{ route('admin.userupdate',$udata->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{-- {{ $udata->pic }} --}}
                                            <input type="hidden" value="{{$udata->id }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="firstnameInput" class="form-label">First
                                                            Name</label>
                                                        <input type="text" name="first_name" class="form-control" id="firstnameInput"
                                                            placeholder="Enter your firstname" value="{{$udata->first_name}}">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="lastnameInput" class="form-label">Last
                                                            Name</label>
                                                        <input type="text" name="last_name" class="form-control" id="lastnameInput"
                                                            placeholder="Enter your lastname" value="{{$udata->last_name}}">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="phonenumberInput" class="form-label">Phone
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            id="phonenumberInput"
                                                            name="phone"
                                                            placeholder="Enter your phone number"
                                                            value="{{$udata->phone}}  ">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="emailInput" class="form-label">Email
                                                            Address</label>
                                                        <input type="email" disabled class="form-control" id="emailInput"
                                                            placeholder="Enter your email"
                                                            value="{{Auth::user()->email}}">
                                                    </div>
                                                </div> <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="emailInput" class="form-label">Update
                                                            Picture</label>
                                                        <input type="file" name="pic" value="{{ $udata->pic }}" class="form-control" id="emailInput"
                                                            >
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane" id="changePassword" role="tabpanel">
                                        <form action="{{ route('admin.uppass') }}" method="POST" >
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="oldpasswordInput" class="form-label">Old
                                                            Password*</label>
                                                        <input type="password" name="current_password" class="form-control"
                                                            id="oldpasswordInput"
                                                            placeholder="Enter current password">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="newpasswordInput" class="form-label">New
                                                            Password*</label>
                                                        <input type="password" name="new_password" class="form-control"
                                                            id="newpasswordInput" placeholder="Enter new password">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="confirmpasswordInput" class="form-label">Confirm
                                                            Password*</label>
                                                        <input type="password" name="cnew_password" class="form-control"
                                                            id="confirmpasswordInput"
                                                            placeholder="Confirm password">
                                                    </div>
                                                </div>                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success">Change
                                                            Password</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
    </div>
@endsection
