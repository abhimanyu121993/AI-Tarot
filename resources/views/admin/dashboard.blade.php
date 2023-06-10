@extends('admin.includes.layout', ['breadcrumb_title' => 'Dashboard'])
@section('title', 'Dashboard')

@section('main-content')


<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">

            <div class="col-xl-3">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                    <i data-feather="users" class="text-info"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Users</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ App\Models\User::count() }}">{{ App\Models\User::count() }}</span></h4>
                                    {{-- <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35 %</span> --}}
                                </div>
                                {{-- <p class="text-muted text-truncate mb-0">Work this month</p> --}}
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div>




            <!-- end col -->
        </div><!-- end row -->

        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Projects Overview</h4>
                        <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="9851">0</span></h5>
                                    <p class="text-muted mb-0">Number of Projects</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="1026">0</span></h5>
                                    <p class="text-muted mb-0">Active Projects</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">$<span class="counter-value" data-target="228.89">0</span>k</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value" data-target="10589">0</span>h</h5>
                                    <p class="text-muted mb-0">Working Hours</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="projects-overview-chart" data-colors='["--vz-primary", "--vz-warning", "--vz-success"]' dir="ltr" class="apex-charts"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->

    <div class="col-xxl-4">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title mb-0">Upcoming Schedules</h4>
            </div><!-- end cardheader -->
            <div class="card-body pt-0">
                <div class="upcoming-scheduled">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">
                </div>

                <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Events:</h6>
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            09
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Development planning</h6>
                        <p class="text-muted mb-0">iTest Factory </p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">9:20 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            12
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Design new UI and check sales</h6>
                        <p class="text-muted mb-0">Meta4Systems</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">11:30 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            25
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Weekly catch-up </h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">02:00 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            27
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">James Bangs (Client) Meeting</h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">03:45 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->

                <div class="mt-3 text-center">
                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Events</a>
                </div>

            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col --> --}}
</div><!-- end row -->


@endsection
