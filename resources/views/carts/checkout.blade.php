@extends('main')


@section('content')

<form class="bg0 p-t-75 p-b-85" action="" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    @include('alert')
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                            <tr class="table_head">
                                <th colspan="2" style="padding-left: 20px">Tổng quan đơn hàng</th>
                            </tr>
                            @foreach ($products as $key => $product )
                                @foreach ($carts[$product->id] as $c)
                                <tr class="table_row">
                                    <td class="column-1" style="padding-left: 30px">
                                        <div class="how-itemcart1">
                                            <img src="{{url(explode("\r\n", $product->thumb)[count(explode("\r\n", $product->thumb))-1])}}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{$product->name}}</td>
                                    <td class="column-3" style="text-align: center">
                                        {{$c['size']}}
                                    </td>
                                    <td class="column-4" style="text-align: center">
                                        x{{$c['qty']}}
                                    </td>
                                    <td class="column-5" style="padding-left: 20px; padding-right: 20px">
                                        @if ($product->price_sale)
                                            {{number_format($product->price_sale*$c['qty'])}}
                                        @else
                                            {{number_format($product->price*$c['qty'])}}
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody></table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <a href="{{url('/carts')}}" class="back">
                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Quay lại
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Thông tin người nhận
                    </h4>

                    <div class="flex-w flex-t p-t-15 p-b-13">
                        <div class="size-200">
                            <span class="stext-110 cl2">
                                Họ và Tên:
                            </span>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" value="{{ Auth::user() -> name }}">
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-15 p-b-13">
                        <div class="size-200">
                            <span class="stext-110 c12">
                                Số điện thoại:
                            </span>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" value="{{ Auth::user() -> phone }}">
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-15 p-b-13">
                        <div class="size-200">
                            <span class="stext-110 cl2">
                                Địa chỉ:
                            </span>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="{{ Auth::user() -> address }}">
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-15 p-b-13">
                        <div class="size-200">
                            <span class="stext-110 cl2">
                                Email:
                            </span>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" value="{{ Auth::user() -> email }}">
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-15 p-b-13">
                        <div class="size-200">
                            <span class="stext-110 cl2">
                                Ghi chú:
                            </span>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="order_note">
                        </div>
                    </div>


                    <div class="flex-w flex-t p-b-13">
                        <div class="size-208" style="width: 40%">
                            <span class="stext-110 cl2">
                                Tổng số tiền:
                            </span>
                        </div>

                        <div class="size-209" style="width: 60%">
                            <span class="mtext-110 cl2 price-total2" >

                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Phí ship:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2 ship-fee">

                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-b-13" style="padding-top: 15px; padding-bottom: 15px">
                        <div class="size-208" style="width: 60%">
                            <span class="stext-110 cl2">
                                TỔNG THANH TOÁN:
                            </span>
                        </div>

                        <div class="size-209" style="width: 40%">
                            <span class="mtext-110 cl2 total">

                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Xác nhận đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    window.addEventListener('load', (event) => {
        calTotal2();
        calshipfee();
    });

</script>
@endsection



