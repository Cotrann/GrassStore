@extends('main')

@section('content')

<div class="container" style="padding-top: 50px">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
            		<nav class="side-menu">
        				<ul class="nav nav-tabs">
        					<li><a href="#profile" data-toggle="tab" ><span class="fa fa-user"></span> Thông tin cá nhân</a></li>
                            <li><a href="#changepassword" data-toggle="tab"><i class="fa-solid fa-key"></i></i> Đổi mật khẩu</a></li>
        					<li><a href="#ordered" data-toggle="tab"><i class="fa-solid fa-truck-fast"></i> Đơn hàng</a></li>
                            @if ( $user->level == '1')
                            <li><a href="{{url('/admin')}}"><i class="fa-solid fa-shop"></i> Quản lý cửa hàng</a></li>
                            @endif
                            <li><a href="{{url('/logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
        				</ul>
        			</nav>
                </div>
                <div class="content-panel tab-content">
                    @include('alert')
                    <div class="tab-pane" id="profile">
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Họ và Tên</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}"">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Địa chỉ</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Số điện thoại</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" type="submit" value="Cập nhật">
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                    <div class="tab-pane" id="changepassword">
                        <form class="form-horizontal" action="{{url('/profile/changepassword')}}" method="POST">
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Mật khẩu hiện tại</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="password" name="currentpass" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Mật khẩu mới</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="password" name="passnew" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Nhập lại mật khẩu mới</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="password" name="passnew_again" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" type="submit" value="Đổi mật khẩu">
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                    <div class="tab-pane" id="ordered">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-date" style="padding-left: 30px">Ngày đặt hàng</th>
                                        <th class="column-sl">Số lượng</th>
                                        <th class="column-price">Tổng thanh toán</th>
                                        <th class="column-note">Ghi chú</th>
                                        <th class="column-status">Trạng thái</th>
                                        <th class="column-action" style="padding-right: 5px"></th>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr class="table_row">
                                            <td class="column-date" style="padding-left: 30px">
                                                {{$order->created_at->format('d M Y')}}
                                            </td>
                                            <td class="column-sl">{{$order->items}}</td>
                                            <td class="column-price">
                                                {{number_format($order->total)}}đ
                                            </td>
                                            <td class="column-note">{{$order->order_note}}</td>
                                            <td class="column-status">
                                                {!! \App\Helpers\Helper::ordered_status($order->status) !!}
                                            </td>
                                            <td class="column-action" style="padding-right: 5px">
                                                <button type="button" class="btn mb-2 mb-md-0 btn-outline-secondary btn-block">Chi tiết</button>
                                                @if ($order->status == '1')
                                                <button type="button" class="btn mb-2 mb-md-0 btn-outline-secondary btn-block">Đã nhận được hàng</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

<script>
    window.onload = function() {
        let tabID = localStorage.getItem('activeTab');
        $(tabID).tab('show');
    };
</script>

