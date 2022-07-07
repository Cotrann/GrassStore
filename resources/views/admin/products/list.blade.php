@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 60px">ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá gốc</th>
                <th>Giá Khuyến Mãi</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 80px">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $key => $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->menu->name }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->price_sale }}</td>
                <td>{!! $p->active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                <td>{{ $p->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{url('/admin/products/edit/'.$p->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$p->id}}, '{{url('/admin/products/destroy')}}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $product -> onEachSide(5) -> links() !!}
    </div>

@endsection
