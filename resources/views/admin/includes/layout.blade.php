<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

{{-- ===================== Head ================== --}}
@include('admin.includes.head')
@yield('header-area')
{{-- ===================== Head_end ================== --}}

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- ===================== Topbar ================== --}}
        @include('admin.includes.topbar')
        {{-- ===================== Top_end ================== --}}
        <!-- ========== App Menu ========== -->


        <!-- ================= Sidebar ============ -->
        @include('admin.includes.sidebar')
        <!-- ================= Sidebar ============ -->

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @include('admin.includes.breadcrumb')

                    {{-- Main section --}}
                    @yield('main-content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <!-- JAVASCRIPT -->
    @yield('script-area');
    <!-- Foot -->
    @include('admin.includes.foot');
    <!-- Foot End -->
    <!-- Foot -->
    @include('admin.includes.footer');
    <!-- Foot End -->

</body>

</html>
