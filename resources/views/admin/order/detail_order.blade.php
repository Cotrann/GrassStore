@extends('admin.main')

@section('content')
<div class="card-body row">
    <div class="col-lg-6">
        <table class="table table-striped">
            <tbody>
                @foreach ($products as $prd)
                <tr>
                    <td>
                        <div class="how-itemcart1">
                            <img src="{{url(explode("\r\n", $prd->thumb)[count(explode("\r\n", $prd->thumb))-1])}}" height="70">
                        </div>
                    </td>
                    <td>{{$prd->name}}</td>
                    <td>
                        {{$prd->pivot->size}}
                    </td>
                    <td>
                        x{{$prd->pivot->quantity}}
                    </td>
                    <td>
                        {{number_format($prd->price_sale ? $prd->price_sale*$prd->pivot->quantity : $prd->price*$prd->pivot->quantity)}}đ
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-4 offset-lg-1">
        <div class="form-group">
            <label for="exampleInputEmail1">Họ Và Tên</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orders->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số Điện Thoại</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orders->phone}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Địa Chỉ</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orders->address}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orders->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ghi Chú</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orders->note}}">
        </div>
        <div class="form-group">
            <span>
                Tổng Số Tiền : {{number_format($orders->items < 3 ? $orders->total - 30000 : $orders->total)}}đ
            </span>
            <br>
            <span>
                Phí Ship : {{number_format($orders->items < 3 ? 30000 : 0)}}đ
            </span>
            <br>
            <span>
                Tổng Thanh Toán : {{number_format($orders->total)}}đ
            </span>
        </div>
    </div>
</div>


<script>
    window.addEventListener('load', (event) => {
        calTotal2();
        calshipfee();
    });

</script>

@endsection
