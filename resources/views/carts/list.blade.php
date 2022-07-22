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
                                            <td class="column-3">
                                                {{$c['size']}}
                                            </td>
                                            <td class="column-4">{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}</td>
                                            <td class="column-5" style="padding-right: 0px; text-align: center">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$c['qty']}}">

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

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or contact us if you need any help.
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Calculate Shipping
                                    </span>

                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 142.8px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-zj-container"><span class="select2-selection__rendered" id="select2-time-zj-container" title="Select a country...">Select a country...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                    </div>

                                    <div class="flex-w">
                                        <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            Update Totals
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
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

