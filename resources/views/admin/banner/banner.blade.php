@extends('admin.includes.layout', ['breadcrumb_title' => 'Notice'])
@section('title', 'Notice')
@section('main-content')

    @can('banner_create')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Notice</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form method="post"
                                action="{{ isset($editbanner) ? route('admin.banner.update', $editbanner->id) : route('admin.banner.store') }}"
                                enctype="multipart/form-data">
                                @if (isset($editbanner))
                                    @method('patch')
                                @endif
                                @csrf
                                <div class="form-group row">

                                    <div class="col-4">
                                        <label>Title 1</label>
                                        <input type="text" class="form-control" name="title1" placeholder="Enter Title"
                                            value="{{ isset($editbanner) ? $editbanner->title1 : '' }}" required>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <label>Title 2</label>
                                        <input type="text" class="form-control" name="title2"
                                            placeholder="Enter Title"value="{{ isset($editbanner) ? $editbanner->title2 : '' }}"
                                            required>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <label>Link (Url)</label>
                                        <input type="text" class="form-control" name="link"
                                            placeholder="Enter Url"value="{{ isset($editbanner) ? $editbanner->link : '' }}"
                                            required>
                                    </div>
                                    <div class="col-4" id="uploadfile">
                                        <label>Upload file</label>
                                        <input type="file" class="form-control" name="banner"
                                            value="{{ isset($editbanner) ? $editbanner->banner : '' }}">
                                    </div>
                                </div>
                                @if (isset($editbanner))
                                    <div class="row mb-2">
                                        <div class="col-2 sub">
                                            <img src="{{ asset($editbanner->banner) }}" class="me-75 bg-light-danger"
                                                style="height:60px;width:60px;" />
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-2 sub">
                                        <br />
                                        <button type="submit"
                                            class="btn btn-primary btn-block">{{ isset($editbanner) ? 'Update' : 'Submit' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endcan

    @can('banner_read')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Manage Notices</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Banner</th>
                                    <th>Title 1</th>
                                    <th>Title 2</th>
                                    <th>Link</th>
                                    <th>Created_at</th>
                                    @canany(['banner_edit', 'banner_delete'])
                                        <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($banners as $b)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset($b->banner) }}" class="me-75 bg-light-danger"
                                                style="height:60px;width:60px;" /></td>
                                        <td>{{ $b->title1 }}</td>
                                        <td>{{ $b->title2 }}</td>
                                        <td>{{ $b->link }}</td>
                                        <td>{{ $b->created_at }}</td>
                                        @php $bannerid=Crypt::encrypt($b->id); @endphp
                                        @canany(['banner_edit', 'banner_delete'])
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="ri-more-2-fill"></i>
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @can('banner_edit')
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('admin.banner.edit', $bannerid) }}">Edit</a></li>
                                                        @endcan
                                                        @can('banner_delete')
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="event.preventDefault();document.getElementById('delete-form-{{ $bannerid }}').submit();">Delete</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                    @can('banner_delete')
                                                        <form id="delete-form-{{ $bannerid }}"
                                                            action="{{ route('admin.banner.destroy', $bannerid) }}" method="post"
                                                            style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endcan

@endsection
