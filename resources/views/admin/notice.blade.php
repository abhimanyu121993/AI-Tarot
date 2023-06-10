@extends('admin.includes.layout', ['breadcrumb_title' => 'Notice'])
@section('title', 'Notice')
@section('main-content')

    @can('notice_create')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{isset($Notice_data)?'Update Notice':"Add Notice";}}</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form method="post" action="{{ isset($Notice_data)?route('admin.notice.update',$Notice_data->id):route('admin.notice.store')}}" enctype="multipart/form-data">
                                @csrf
                                @isset($Notice_data)
                                    @method('patch')
                                @endisset
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{isset($Notice_data->title)?$Notice_data->title:'';}}" 
                                            required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Notice Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="" selected disabled>Select Category</option>
                                            <option value="notice" {{ isset($Notice_data->category)?($Notice_data->category=='notice'?'selected':''):'' }}>Latest Notice</option>
                                            <option value="admission" {{ isset($Notice_data->category)?($Notice_data->category=='admission'?'selected':''):'' }}>Admission</option>
                                            <option value="examination" {{ isset($Notice_data->category)?($Notice_data->category=='examination'?'selected':''):'' }}>Examination</option>
                                            <option value="events" {{ isset($Notice_data->category)?($Notice_data->category=='events'?'selected':''):'' }}>Events</option>
                                            <option value="seminars" {{ isset($Notice_data->category)?($Notice_data->category=='seminars'?'selected':''):'' }}>Seminars</option>
                                            <option value="tenders" {{ isset($Notice_data->category)?($Notice_data->category=='tenders'?'selected':''):'' }}>Tenders</option>
                                        </select>
                                    </div>
                                    <!-- @isset($Notice_data->type)
                                        @if($Notice_data->type=='file')
                                            $filedisable = 'disabled'  
                                        @elseif($Notice_data->type=='link')
                                            $linkdisable = "disabled";
                                        @endif
                                    @endisset -->
                                    <div class="form-check col-1 mt-3">
                                        <input class="form-check-input" type="radio" name="filetype" value="file"
                                            id="filetype" {{ isset($Notice_data->type)?($Notice_data->type=='file'? 'checked' : 'disabled'):""}} >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            File
                                        </label>
                                    </div>
                                    <div class="form-check col-1 mt-3" >
                                        <input class="form-check-input" type="radio" name="filetype" value="link"
                                            id="linktype" {{ isset($Notice_data->type)?($Notice_data->type=='link'? 'checked' : 'disabled'):""}} >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Link
                                    </div>
                                    <div class="col-4" id="uploadfile" style="display:{{ isset($Notice_data->type)?($Notice_data->type=='file'? 'inline' : 'none'):'none'}};">
                                        <label>Upload file</label>
                                        <input type="file" class="form-control" name="file">
                                        @isset($Notice_data->filename) 
                                        @if(!empty($Notice_data->filename) && $Notice_data->type=='file')
                                            <a href="{{url($Notice_data->filename)}}" target="_blank" class="btn btn-warning"/>View</a>
                                            <input type="hidden" name="oldfile" value="{{isset($Notice_data->filename)?$Notice_data->filename:'';}}">
                                        @endif
                                        @endisset
                                    </div>
                                    <div class="col-4" id="uploadlink" style="display:{{ isset($Notice_data->type)?($Notice_data->type=='link'? 'inline' : 'none'):'none'}};">
                                        <label>Upload Link</label>
                                        <input type="text" class="form-control" name="link" value="{{isset($Notice_data->filename)?($Notice_data->type=='link'?$Notice_data->filename:''):'';}}">
                                        @isset($Notice_data->filename) 
                                        @if(!empty($Notice_data->filename) && $Notice_data->type=='link')
                                            <!-- <a href="{{url($Notice_data->filename)}}" target="_blank" class="btn btn-warning"/>View</a> -->
                                            <input type="hidden" name="oldfile" value="{{isset($Notice_data->filename)?$Notice_data->filename:'';}}">
                                        @endif
                                        @endisset
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2 sub">
                                        <br />
                                        <button type="submit" class="btn btn-primary btn-block">{{isset($Notice_data)?'Update':"Submit";}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('notice_read')
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Data</th>
                                    <th>Uploaded Date</th>
                                    @canany(['user_edit', 'user_delete'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>

                                @if ($notices)
                                    @foreach($notices as $n)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$n->title}}</td>
                                        <td>{{$n->category}}</td>
                                        @if($n->type=='file')
                                        <td><a href="{{asset($n->filename)}}" class="btn btn-warning btn-sm" target="_blank">View</a></td>
                                        @else
                                        <td><a href="{{$n->filename}}" class="btn btn-warning btn-sm" target="_blank">View</a></td>
                                        @endif

                                        <td>{{$n->updated_at}}</td>
                                        @canany(['notice_edit', 'notice_delete'])
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                @php $cryptid=Crypt::encrypt($n->id); @endphp
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @can('notice_edit')
                                                    <li><a class="dropdown-item" href="{{ route('admin.notice.edit',$cryptid) }}" >Edit</a></li>
                                                    @endcan
                                                    @can('notice_delete')
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cryptid }}').submit();">Delete</a></li>

                                                    @endcan
                                                </ul>
                                                @can('notice_delete')
                                                <form id="delete-form-{{ $cryptid }}" action="{{ route('admin.notice.destroy', $cryptid) }}"
                                                        method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                        @endcanany
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="12" class="text-center">No Records Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endcan



    <!-- Grids in modals -->
    @section('script-area')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            $("#filetype").click(function() {
                $('#uploadfile').css("display","inline");
                $("#uploadlink").css("display","none");
            });
            $("#linktype").click(function() {
                $("#uploadlink").css("display","inline");
                $('#uploadfile').css("display","none");       
            });
    </script>
    @endsection

@endsection



