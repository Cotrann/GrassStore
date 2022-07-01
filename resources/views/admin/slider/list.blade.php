@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 60px">ID</th>
                <th>Tiêu Đề</th>
                <th>Sắp Xếp</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Cập Nhật</th>
                <th style="width: 80px">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $key => $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->sort_by }}</td>
                <td>{{ $s->url }}</td>
                <td>
                    <a href="{{url($s->thumb)}}" target="_blank">
                        <img src="{{url($s->thumb)}}" height="50px">
                    </a>
                </td>
                <td>{!! $s->active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                <td>{{ $s->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{url('/admin/sliders/edit/'.$s->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$s->id}}, '{{url('/admin/sliders/destroy')}}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $slider -> links() !!}

@endsection
