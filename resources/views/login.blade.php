<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ url('template/css/login.css') }}">
</head>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng Nhập</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng Ký</label>
		<div class="login-form">
            <form action="{{URL::to('/login/store')}}" method="POST">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input id="user" name="email" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Mật khẩu</label>
                        <input id="pass" name="password" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Ghi nhớ Đăng Nhập</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Đăng Nhập">
                    </div>
                    <div class="hr"></div>
                    @include('admin.alert')
                </div>
                @csrf
            </form>
            <form action="" method="POST">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input id="user" type="text" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="name" class="label">Họ và Tên</label>
                        <input id="name" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Số Điện Thoại</label>
                        <input id="pass" type="number" class="input" name="phone">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Mật khẩu</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Nhập lại Mật khẩu</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password_again">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Đăng Ký">
                    </div>
                    <div class="hr"></div>
                    @include('admin.alert')
                    <div class="foot-lnk">
                        <label for="tab-1">Bạn đã có tài khoản?</a>
                    </div>
                </div>
                @csrf
            </form>
		</div>
	</div>
</div>
