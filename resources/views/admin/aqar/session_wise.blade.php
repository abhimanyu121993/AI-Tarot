@extends('admin.includes.layout', ['breadcrumb_title' => 'AQAR'])
@section('title', 'AQAR')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{isset($Session_data)?'Update':"Upload";}} AQAR(Session Wise)</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($Session_data)?route('admin.sessionwise.update',$Session_data->id):route('admin.sessionwise.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($Session_data)
                                @method('patch')
                            @endisset
                            <div class="row gy-12">

                                <div class="col-xxl-3 col-md-4">
                                    <label for="role" class="form-label">Session</label>
                                    <select name="session" class="form-select">
                                        <option value="">--Select Session--</option>
                                        <option value="2016-17" {{ isset($Session_data->session)?($Session_data->session==2016-17?'selected':''):'' }}>2016-17</option>
                                        <option value="2017-18" {{ isset($Session_data->session)?($Session_data->session==2017-18?'selected':''):'' }}>2017-18</option>
                                        <option value="2018-19" {{ isset($Session_data->session)?($Session_data->session==2018-19?'selected':''):'' }}>2018-19</option>
                                        <option value="2019-20" {{ isset($Session_data->session)?($Session_data->session==2019-20?'selected':''):'' }}>2019-20</option>
                                        <option value="2020-21" {{ isset($Session_data->session)?($Session_data->session==2020-21?'selected':''):'' }}>2020-21</option>
                                        <option value="2021-22" {{ isset($Session_data->session)?($Session_data->session==2021-22?'selected':''):'' }}>2021-22</option>
                                        <option value="2022-23" {{ isset($Session_data->session)?($Session_data->session==2022-23?'selected':''):'' }}>2022-23</option>
                                        <option value="2023-24" {{ isset($Session_data->session)?($Session_data->session==2023-24?'selected':''):'' }}>2023-24</option>
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-md-4">
                                    <label for="title" class="form-label">Title</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="title" name="title" value="{{isset($Session_data->title)?$Session_data->title:'';}}" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="upload" class="form-label">Upload File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="upload" name="upload" placeholder="Upload file">
                                        @isset($Session_data->upload)
                                        @if(!empty($Session_data->upload))
                                            <a href="{{ url($Session_data->upload) }}" target="_blank" class="btn btn-warning">View</a>
                                        @endif
                                        @endisset
                                        <input type="hidden" name="oldfile" value="{{isset($Session_data->upload)?$Session_data->upload:'';}}">
                                    </div>

                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-12 mt-3">
                                <div class="col-xxl-3 col-md-4">
                                    <button class="btn btn-primary" type="submit">{{isset($Session_data)?'Update':"Submit";}}</button>
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
                    <h4 class="card-title mb-0 flex-grow-1">Manage AQAR</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Session</th>
                                <th scope="col">Title</th>
                                <th scope="col">File</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($session as $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->session }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>@isset($data->upload)
                                        @if(!empty($data->upload))
                                        <a href="{{url($data->upload)}}" target="_blank" class="btn btn-warning btn-sm">view</a>
                                        @else
                                            &#10060;
                                        @endif
                                        @endisset
                                    </td>
                                    <td>{{ $data->created_at }}</td>
                                    @php $cryptid=Crypt::encrypt($data->id); @endphp
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{ route('admin.sessionwise.edit',$cryptid) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cryptid }}').submit();">Delete</a></li>
                                            </ul>
                                            <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.sessionwise.destroy', $cryptid) }}"
                                                method="post" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
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



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection

