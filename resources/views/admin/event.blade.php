@extends('admin.includes.layout', ['breadcrumb_title' => 'Events'])
@section('title', 'Events')
@section('main-content')

    @can('event_create')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($editevent) ? 'Update' : 'Add' }} Events</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($editevent) ? route('admin.event.update', $editevent->id) : route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($editevent))
                                @method('patch')
                            @endif
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="event" class="form-label">Event Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="event" name="name" value="{{ isset($editevent) ? $editevent->name : '' }}" placeholder="Event Name">

                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="gallery" class="form-label">Event Thumbnail</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="gallery" name="file" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" type="submit">{{ isset($editevent) ? 'Update' : 'Submit' }}</button>
                                </div>
                                <!--end col-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endcan

    @can('event_read')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Events</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table container table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col-1">Sr.No.</th>
                                <th scope="col-8">Event Name</th>
                                <th scope="col-1">Thumbnail</th>
                                <th scope="col-1">Created at</th>
                                @canany(['event_edit', 'event_delete'])
                                <th scope="col-1">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $data)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td style="word-wrap: break-word;">{{ $data->name }}</td>
                                    <td><img src="{{ asset($data->thumbnail ?? '') }}" alt="{{ $data->name ?? ''}}" height="100" width="200"/></td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.gallery.show', $data->id) }}" class="btn btn-warning">View/Upload Image</i></a>
                                    </td>
                                    @canany(['event_edit', 'event_delete'])
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $cryptid=Crypt::encrypt($data->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @can('event_edit')
                                                    <li><a class="dropdown-item" href="{{ route('admin.event.edit', $cryptid) }}">Edit</a></li>
                                                @endcan
                                                @can('event_delete')
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cryptid }}').submit();">Delete</a></li>
                                                @endcan
                                            </ul>
                                            @can('event_delete')
                                            <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.event.destroy', $cryptid) }}"
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

@section('script-area')
@endsection

@endsection
