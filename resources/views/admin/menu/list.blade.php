@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 60px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 80px">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menu) !!}
        </tbody>
    </table>
@endsection
