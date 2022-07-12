@extends('admin.main')

@section('head')
    <script src="{{ url('/ckeditor5-build-classic/ckeditor.js') }}"></script>
@endsection

@section('content')
    <form action="" method="POST" >

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
                <input type="file" multiple name="file" id="upload" class="form-control" >
                <div id="image_show" class="row">
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Chọn size</label>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" id="onesize" name="hasSize" value="0" checked=''>
                  <label for="onesize" class="custom-control-label">Một Size</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="1" type="radio" id="selectsize" name="hasSize">
                  <label for="selectsize" class="custom-control-label">Chọn Size</label>
                </div>
                <div class="col-sm-6" id="disp_size" style="display: none;">
                    <div class="form-group list-size">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="26" type="checkbox" id="26mm" name="size[]">
                            <label for="26mm" class="custom-control-label">26mm</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="28" type="checkbox" id="28mm" name="size[]">
                            <label for="28mm" class="custom-control-label">28mm</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="32" type="checkbox" id="32mm" name="size[]">
                            <label for="32mm" class="custom-control-label">32mm</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="36" type="checkbox" id="36mm" name="size[]">
                            <label for="36mm" class="custom-control-label">36mm</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="40" type="checkbox" id="40mm" name="size[]">
                            <label for="40mm" class="custom-control-label">40mm</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="S" type="checkbox" id="SizeS" name="size[]">
                            <label for="SizeS" class="custom-control-label">Size S</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="M" type="checkbox" id="SizeM" name="size[]">
                            <label for="SizeM" class="custom-control-label">Size M</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="L" type="checkbox" id="SizeL" name="size[]">
                            <label for="SizeL" class="custom-control-label">Size L</label>
                        </div>
                    </div>
                </div>
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
