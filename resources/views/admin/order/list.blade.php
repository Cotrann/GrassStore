@extends('admin.main')

@section('content')
    <table class="table" style="text-align: center">
        <thead>
            <tr>
                <th style="width: 60px">ID</th>
                <th>Ngày đặt hàng</th>
                <th>Số lượng</th>
                <th>Tổng thanh toán</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->items }}</td>
                <td>{{ number_format($order->total) }}đ</td>
                <td>{{ $order->note }}</td>
                <td>
                    {!! \App\Helpers\Helper::ordered_status($order->status) !!}
                </td>
                <td>
                    <a class="btn btn-sm" href="{{url('/admin/order_detail/'.$order->id)}}">
                        <i class="fa-solid fa-circle-info" style="font-size: 20px"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $orders -> onEachSide(5) -> links() !!}
    </div>

@endsection
