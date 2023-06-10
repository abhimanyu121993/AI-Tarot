@extends('admin.includes.layout', ['breadcrumb_title' => 'User Profile'])
@section('title', 'User Profile')
@section('main-content')

<div class="page-content"   style="margin-top: -115px">
    <div class="container-fluid">
        <div class="position-relative margin-top:85px">
            <div class="profile-wid-bg ">
                <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset( Auth::user()->pic ?? 'assets/images/users/avatar-1.jpg')}}" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <div class="col ">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                        <p class="text-white-75">{{ Auth::user()->roles[0]->name}}</p>
                        <div class="hstack text-white-50 gap-1">
                        </div>
                    </div>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex">
                        <!-- Nav tabs -->
                        <div class="flex-shrink-0">
                            <a href="{{route('admin.editprofile',Auth::user()->id)}}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-12">


                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Full Name : <span style="color: #f27f78;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></th>
                                                            {{-- <td class="text-muted"></td> --}}
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Role : <span style="color: #f27f78;">{{Auth::user()->roles[0]->name}}</span></th>
                                                            {{-- <td class="text-muted"></td> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->
</div>

@endsection

