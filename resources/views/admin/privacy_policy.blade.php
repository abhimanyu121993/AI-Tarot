@extends('admin.includes.layout', ['breadcrumb_title' => 'Privacy Policy'])
@section('title', 'Privacy Policy')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Privacy Policy</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="post" action="{{route('admin.privacy-policy.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="ckeditor form-control" value="" name="privacy">{!! $privacy->value??'' !!}</textarea>
                            </div><br>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grids in modals -->
@endsection


@section('script-area')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
