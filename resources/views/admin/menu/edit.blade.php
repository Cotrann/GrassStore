@extends('admin.main')

@section('head')
    <script src="{{ url('/ckeditor5-build-classic/ckeditor.js') }}"></script>
@endsection

@section('content')
    <form action="" method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Nhập tên Danh mục">
            </div>

            <div class="form-group">
                <label>Danh Mục Cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>
                        Danh Mục Cha
                    </option>
                    @foreach ($menu1 as $menuParent)
                    <option value="{{ $menuParent->id}}" {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                        {{ $menuParent->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea type="text" name="description" class="form-control" placeholder="Enter Description">{{ $menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea type="text" name="content" id="content" class="form-control" placeholder="Enter Detail Description">{{ $menu->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $menu->active == 1 ? 'checked=""' : ''}}>
                  <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" value="0" type="radio" id="nonactive" name="active" {{ $menu->active == 0 ? 'checked=""' : ''}}>
                  <label for="nonactive" class="custom-control-label">Không</label>
                </div>
              </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> Cập Nhật Danh Mục </button>
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
