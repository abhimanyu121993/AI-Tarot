@extends('admin.includes.layout', ['breadcrumb_title' => 'Add Tarot Background'])
@section('title', 'Tarot Background')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Tarot Background</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{route('admin.tarot-post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Tarot Background Images</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="file" multiple name="background_images[]" placeholder="file">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" style="transform: translateY(29px);" type="submit" >Submit</button>
                                </div>
                                <!--end col-->
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
                                <th scope="col">Background Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarot as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>
                                        <img src="{{ asset($user->background_images) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" />
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{route('admin.tarot-delete',$user->id)}}">Delete</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection
