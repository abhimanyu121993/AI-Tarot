<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/tarrot-logo.svg') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/tarrot-logo.svg') }}" alt="" height="70"></span>
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <!-- Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}"  role="button" aria-expanded="false" >
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                @can('user')
                    <!-- User Menu -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.user.index') }}"  role="button" aria-expanded="false" >
                            <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">User</span>
                        </a>
                    </li>
                @endcan

                @hasrole('Admin')
                <!-- Role/Permission Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="lock" class="icon-dual"></i> <span data-key="t-dashboards">Roles/Permission</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.role.index')}}" class="nav-link" data-key="t-analytics"> Role </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.permission.index')}}" class="nav-link" data-key="t-analytics">Permission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.rolePermission')}}" class="nav-link" data-key="t-analytics">Role has permission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
                @hasrole('Admin')
                <!-- Tarot Card -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="lock" class="icon-dual"></i> <span data-key="t-dashboards">Tarot Card</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.tarot.index')}}" class="nav-link" data-key="t-analytics"> Add Tarot Card </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.tarot.create')}}" class="nav-link" data-key="t-analytics">Manage Tarot Card</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
                @hasrole('Admin')
                <!-- Tarot Card -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="lock" class="icon-dual"></i> <span data-key="t-dashboards">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.about.index')}}" class="nav-link" data-key="t-analytics"> About</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.terms-condition')}}" class="nav-link" data-key="t-analytics"> Terms & Condition</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.privacy-policy')}}" class="nav-link" data-key="t-analytics"> Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
                <!-- User Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.tarot-get') }}"  role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Tarot Background</span>
                    </a>
                </li>
                @hasrole('Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.subscription.index') }}"  role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Subscription</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
