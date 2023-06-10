@extends('admin.includes.layout', ['breadcrumb_title' => 'User'])
@section('title', 'User')
@section('main-content')

    @can('user_create')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Register User</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Select Role</label>
                                    <select name="roleid"  class="form-select">
                                        <option value="">--Select Role--</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pic" class="form-label">Image Thumbnail</label>
                                    <input type="file" class="form-control" name="pic" />
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" type="submit" >Submit</button>
                                </div>
                                @if (isset($edituser))
                                    <div class="col-sm-6">
                                        <img src="{{asset($edituser->pic) }}" class="bg-light-info" alt="" style="height:100px;width:100px;">
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('user_read')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Users</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                @canany(['user_edit', 'user_delete'])
                                <th scope="col">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>
                                        <img src="{{ asset( $user->pic) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" />
                                    </td>
                                    <td>{{ $user->first_name ?? '' }}</td>
                                    <td>{{ $user->last_name ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->phone ?? '' }}</td>
                                    <td>{{ $user->roles[0]->name ?? '' }}</td>
                                    @php $cryptid=Crypt::encrypt($user->id); @endphp
                                    @canany(['user_edit', 'user_delete'])
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                {{-- <li><a class="dropdown-item" href="#">View</a></li> --}}
                                                @can('user_edit')
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                @endcan
                                                @can('user_delete')
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                @endcan
                                            </ul>
                                            @can('user_delete')
                                                <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.user.destroy', $cryptid) }}"
                                                        method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @endcan
                                        </div>
                                    </td>
                                    @endcanany
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
