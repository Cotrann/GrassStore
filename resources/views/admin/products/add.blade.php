@extends('admin.main')

@section('head')
    <script src="{{ url('/ckeditor5-build-classic/ckeditor.js') }}"></script>
@endsection

@section('content')
    <form action="" method="POST">

        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" name="name" class="form-control" id="products" placeholder="Enter name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach ($menu as $m)
                            <option value="{{ $m->id}}">{{ $m->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="number" name="price" class="form-control" id="products" placeholder="Enter price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá sale</label>
                        <input type="number" name="price_sale" class="form-control" id="products" placeholder="Enter sale price">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea type="text" name="description" class="form-control" placeholder="Enter Description"></textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea type="text" name="content" id="content" class="form-control" placeholder="Enter Detail Description"></textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" id="upload" class="form-control" >
                <div id="image_show">
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                  <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="0" type="radio" id="nonactive" name="active">
                  <label for="nonactive" class="custom-control-label">Không</label>
                </div>
              </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> Thêm Sản Phẩm </button>
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
