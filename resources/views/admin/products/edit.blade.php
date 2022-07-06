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
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="products" placeholder="Enter name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach ($menu as $m)
                            <option value="{{ $m->id}}" {{$product->menu_id == $m->id ? 'selected' : ''}}>
                                {{ $m->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="products" placeholder="Enter price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá sale</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control" id="products" placeholder="Enter sale price">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea type="text" name="description"  class="form-control" placeholder="Enter Description">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea type="text" name="content" id="content" class="form-control" placeholder="Enter Detail Description">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" id="upload" multiple class="form-control" >
                <div id="image_show" class="row">

                    @foreach (explode("\n", $product->thumb) as $thumb)
                        <div class="box" data-url="{{ trim($thumb) }}">
                            <button type="button" class="delete" onclick="deleteImage(this)">
                                <span>&times;</span>
                            </button>
                            <div class="image">
                                <img src="{{ url($thumb) }}" />
                            </div>
                        </div>

                    @endforeach

                </div>
                <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $product->active == 1 ? 'checked=""' : ''}}>
                  <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="0" type="radio" id="nonactive" name="active" {{ $product->active == 0 ? 'checked=""' : ''}}>
                  <label for="nonactive" class="custom-control-label">Không</label>
                </div>
              </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> Cập Nhật Sản Phẩm </button>
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
