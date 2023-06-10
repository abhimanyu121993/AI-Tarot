@extends('admin.includes.layout', ['breadcrumb_title' => 'Gallery'])
@section('title', 'Gallery')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Upload Photos in {{ $event->name }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <input type="hidden" name="event_id" value="{{ $event->id }}" />
                                <div class="col-xxl-3 col-md-6">
                                    <label for="gallery" class="form-label">Upload Photo</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="gallery" name="file[]" multiple>
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
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage {{ $event->name }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table container table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Photo</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($events)
                                @foreach ($events as $data)
                                    <tr>
                                        <th>{{ $loop->index + 1 }}</th>
                                        <td>{{ $data->event->name }}</td>
                                        <td><img src="{{ asset($data->image ?? '') }}" alt="{{ $data->event->name ?? ''}}" height="100" width="200"/></td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            @php $cryptid=Crypt::encrypt($data->id); @endphp

                                            <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cryptid }}').submit();"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>

                                            <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.gallery.destroy', $cryptid) }}"
                                                method="post" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5" style="width: 100%">No Photo Available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Grids in modals -->

@section('script-area')
@endsection

@endsection
