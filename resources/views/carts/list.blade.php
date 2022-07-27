@extends('main')

@section('content')
<form class="bg0 p-t-120 p-b-85">
    @if(count($products) != 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1" style="padding-left: 30px">Sản phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3" style="text-align: center">Size</th>
                                        <th class="column-4" style="text-align: center">Giá</th>
                                        <th class="column-5" style="padding-right: 0px; text-align: center">Số lượng</th>
                                        <th class="column-6" style="text-align: center">Thành tiền</th>
                                    </tr>

                                    @foreach ($products as $key => $product )
                                        @foreach ($carts[$product->id] as $c)
                                        <tr class="table_row">
                                            <td class="column-1" style="padding-left: 30px">
                                                <a href="{{url('/carts/delete/'.$product->id.'/'.$c['size'])}}">
                                                    <div class="how-itemcart1">
                                                        <img src="{{url(explode("\r\n", $product->thumb)[count(explode("\r\n", $product->thumb))-1])}}" alt="IMG">
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="column-2">{{$product->name}}</td>
                                            <td class="column-3" style="text-align: center">
                                                {{$c['size']}}
                                            </td>
                                            <td class="column-4">{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}</td>
                                            <td class="column-5" style="padding-right: 0px; text-align: center">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input id="xxx" class="mtext-104 cl3 txt-center num-product" type="number" data-product-id="{{$product->id}}" data-size="{{$c['size']}}" data-price="{{$product->price_sale ? $product->price_sale : $product->price }}" name="num-product1" value="{{$c['qty']}}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-6" style="padding-left: 20px; padding-right: 20px">
                                                @if ($product->price_sale)
                                                    {{number_format($product->price_sale*$c['qty'])}}
                                                @else
                                                    {{number_format($product->price*$c['qty'])}}
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            TỔNG GIỎ HÀNG
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tổng:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2 price-total">
                                    0đ
                                </span>
                            </div>
                        </div>
                        <a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{url('/checkout')}}">
                            Đặt Hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <h3 class="mtext-102" style="font-size: 50px"> Giỏ hàng của bạn đang trống </h3>
        </div>
    @endif
</form>
@endsection

