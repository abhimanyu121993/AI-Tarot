@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Tarot Card'])
@section('title', 'Manage Tarot Card')
@section('main-content')
    <!-- Grids in modals -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Tarot Card</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="myTable" class="table container display">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Alt Name</th>
                                <th scope="col">Meanings</th>
                                <th scope="col">Keyword_1</th>
                                <th scope="col">Keyword_2</th>
                                <th scope="col">Mystic Mirror</th>
                                <th scope="col">Numerology</th>
                                <th scope="col">Card Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarot as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->alt_name ?? '' }}</td>
                                    <td>{{ $user->meanings ?? '' }}</td>
                                    <td>{{ $user->keywords_1 ?? '' }}</td>
                                    <td>{{ $user->keywords_2 ?? '' }}</td>
                                    <td>{{ $user->mystic_mirror ?? '' }}</td>
                                    <td>{{ $user->numerology ?? '' }}</td>
                                    <td>
                                        <img src="{{ asset( $user->card_images) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" />
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                {{-- <li><a class="dropdown-item" href="#">View</a></li> --}}
                                                    <li><a class="dropdown-item" href="{{route('admin.tarot.edit',$user->id)}}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="{{route('admin.tarot.show',$user->id)}}">Delete</a></li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection
