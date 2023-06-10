@extends('admin.includes.layout', ['breadcrumb_title' => 'AQAR'])
@section('title', 'AQAR')
@section('main-content')

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Role</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.role.store') }}" method="POST">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="role" class="form-label">Role Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage AQAR</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($Roles as $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>Criteria 1</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 1) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Criteria 2</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 2) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Criteria 3</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 3) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Criteria 4</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 4) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Criteria 5</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 5) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Criteria 6</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 6) }}" >View Criteria</a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Criteria 7</td>
                                <td>{{ \Carbon\Carbon::now() }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.criteria.show', 7) }}" >View Criteria</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
