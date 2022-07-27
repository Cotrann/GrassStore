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
                        <label>Mức Giảm Giá</label>
                        <input type="number" name="rate" class="form-control" step=".01">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0">Tất cả sản phẩm</option>
                            @foreach ($menu as $m)
                            <option value="{{ $m->id}}">{{ $m->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> Cài đặt </button>
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
