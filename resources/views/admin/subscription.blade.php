@extends('admin.includes.layout', ['breadcrumb_title' => 'Add Subscription Plan'])
@section('title', 'Subscription Plan')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($subscriptionvalue) ? 'Update Subscription Plan' : 'Add Subscription Plan' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form
                            action="{{ isset($subscriptionvalue) ? route('admin.subscription.update', $subscriptionvalue->id) : route('admin.subscription.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @isset($subscriptionvalue)
                                @method('put')
                            @endisset
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Subscription Name</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $subscriptionvalue->name ?? '' }}" class="form-control"
                                            id="first_name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pic" class="form-label">Images</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" value="{{ $subscriptionvalue->image ?? '' }}"
                                            name="image" placeholder="Images" />
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Subscription Value</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $subscriptionvalue->limit ?? '' }}" class="form-control"
                                            id="text" name="limit" placeholder="Subscription Value">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Price</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $subscriptionvalue->price ?? '' }}" class="form-control"
                                            id="email" name="price" placeholder="Price">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Discount Value</label>
                                    <input type="text" class="form-control" value="{{ $subscriptionvalue->discount_value ?? '' }}"
                                        name="discount_value" placeholder="Discount Value" />
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-12">
                                    <label for="pic" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" name="description" placeholder="Description">{{ $subscriptionvalue->description ?? '' }}</textarea>
                                </div>

                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label"></label>
                                    <button class="btn btn-primary"
                                        type="submit">{{ isset($subscriptionvalue) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grids in modals -->
    <!-- Grids in modals -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Tarot Card</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="myTable" class="table display">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Subscription Value</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount Value</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscription as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td><img src="{{ asset($user->image) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" /></td>
                                    <td>{{ $user->limit ?? '' }}</td>
                                    <td>{{ $user->price  ?? '' }}</td>
                                    <td>{{ $user->discount_value ?? '' }}</td>
                                    <td>{{ $user->description ?? '' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                {{-- <li><a class="dropdown-item" href="#">View</a></li> --}}
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.subscription.edit', $user->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.subscription.show', $user->id) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@section('script-area')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
