@extends('admin.includes.layout', ['breadcrumb_title' => 'Criteria'])
@section('title', 'Criteria')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($editcriteria) ? 'Update' : 'Add' }} Criteria {{ $criteria_id }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($editcriteria) ? route('admin.criteria.update', $editcriteria->id) : route('admin.criteria.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($editcriteria))
                                @method('patch')
                            @endif
                            @csrf
                            <input type="hidden" name="criteria_id" value="{{ $criteria_id }}" />
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-8">
                                    <label for="criteria" class="form-label">Criteria Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="criteria" name="name" value="{{ isset($editcriteria) ? $editcriteria->name : '' }}" placeholder="Criteria Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="file" class="form-label">Criteria Data</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="file" name="file">
                                        @isset($editcriteria->path) 
                                        @if(!empty($editcriteria->path))
                                            <a href="{{ url($editcriteria->path) }}" target="_blank" class="btn btn-warning"/>View</a>
                                        @endif
                                        @endisset
                                        <input type="hidden" name="oldfile" value="{{isset($editcriteria->path)?$editcriteria->path:'';}}">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <button class="btn btn-primary" type="submit">{{ isset($editcriteria) ? 'Update' : 'Submit' }}</button>
                                </div>
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
                    <h4 class="card-title mb-0 flex-grow-1">Manage Criteria {{ $criteria_id }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Criteria Name</th>
                                <th scope="col">View Criteria</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($criterias)
                                @foreach ($criterias as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $data->name ?? '' }}</td>
                                        <td><a href="{{ asset($data->path) }}" target="_blank" class="btn-sm btn-warning">View</a></td>
                                        <td>{{ $data->created_at ?? '' }}</td>
                                        @php $cryptid=Crypt::encrypt($data->id); @endphp
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item" href="{{ route('admin.criteria.edit', $cryptid) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cryptid }}').submit();">Delete</a></li>
                                                </ul>
                                                <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.criteria.destroy', $cryptid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="100%" >No Data Available</td>
                                </tr>
                            @endif
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
