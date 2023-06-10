@extends('admin.includes.layout', ['breadcrumb_title' => 'Add Tarot Card'])
@section('title', 'Tarot Card')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{isset($tarotCard)?'Update Tarot Card':'Add Tarot Crad'}}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{isset($tarotCard)?route('admin.tarot.update',$tarotCard->id):route('admin.tarot.store')}}" method="POST" enctype="multipart/form-data">
                            @isset($tarotCard)
                                @method('put')
                            @endisset
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Name</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$tarotCard->name??''}}" class="form-control" id="first_name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Alt Name</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$tarotCard->alt_name??''}}" class="form-control" id="last_name" name="alt_name" placeholder="Alt Name">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Meanings</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$tarotCard->meanings??''}}" class="form-control" id="email" name="meanings" placeholder="Meanings">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Keyword-1</label>
                                    <div class="input-group">
                                        <input type="text" value="{{$tarotCard->keywords_1??''}}"  class="form-control" id="text" name="keyword_1" placeholder="Keyword-1">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Keyword-2</label>
                                    <input type="text" class="form-control" value="{{$tarotCard->keywords_2??''}}" id="text" name="keyword_2" placeholder="Keyword-2">
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pic" class="form-label">Mystic Mirror</label>
                                    <textarea type="text" class="form-control" name="mystic_mirror" placeholder="Mystic Mirror">{{$tarotCard->mystic_mirror??''}}</textarea>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="text" class="form-label">Numerology</label>
                                    <input type="text" class="form-control" value="{{$tarotCard->numerology??''}}" name="numerology" placeholder="Numerology"/>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pic" class="form-label">Card Images</label>
                                    <input type="file" class="form-control" value="{{$tarotCard->card_images??''}}" name="card_images" placeholder="Images"/>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label"></label>
                                    <button class="btn btn-primary" type="submit" >{{isset($tarotCard)?'Update':'Submit'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
