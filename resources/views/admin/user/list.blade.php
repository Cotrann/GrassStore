@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 60px">ID</th>
                <th>Họ và Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Cập Nhật</th>
                <th>Sửa/ Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->phone }}</td>
                <td>{!! $u->level == 1 ? 'Admin' : 'Customer' !!}</td>
                <td>{{ $u->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{url('/admin/users/edit/'.$u->id)}}" ">
                        <i class="fa-solid fa-user-pen"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$u->id}}, '{{url('/admin/users/destroy')}}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $users -> onEachSide(5) -> links() !!}
    </div>

@endsection
