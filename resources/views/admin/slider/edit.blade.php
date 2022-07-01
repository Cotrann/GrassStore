@extends('admin.main')

@section('head')
    <script src="{{ url('/ckeditor5-build-classic/ckeditor.js') }}"></script>
@endsection

@section('content')
    <form action="" method="POST">

        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input type="text" name="name" value="{{ $slide->name}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input type="text" name="url" value="{{ $slide->url}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Sắp Xếp</label>
                <input type="number" name="sort_by" value="{{ $slide->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" id="upload" class="form-control" >
                <div id="image_show">
                    <a href="{{ url($slide->thumb) }}" target="_blank">
                        <img src="{{ url($slide->thumb) }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $slide->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $slide->active == 1 ? 'checked=""' : ''}}>
                  <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="0" type="radio" id="nonactive" name="active" {{ $slide->active == 0 ? 'checked=""' : ''}}>
                  <label for="nonactive" class="custom-control-label">Không</label>
                </div>
              </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> Sửa Slider </button>
        </div>

     </form>

@endsection

@section('footer')
     <script>
        ClassicEditor
        .create( document.querySelector( '#content'))
        .catch( error => {
            console.log( error );
        } );
     </script>
@endsection
