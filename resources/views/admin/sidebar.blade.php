
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ url('/admin') }}" class="brand-link">
	<img src="{{ url('/template/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	<span class="brand-text font-weight-light">Cosmetic Store</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ url('/template/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info" style="display:flex;">
				<a href="#" class="d-block" style="padding-right: 120px;">{{Auth::user()->name}}</a>
                <a href="{{url('/logout')}}" class="d-block"><i class="fas fa-sign-out-alt"></i></a>
			</div>
		</div>
		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
					<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-bars"></i>
						<p>
							Danh mục
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('/admin/menu/list') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Danh sách danh mục</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/menu/add') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Thêm danh mục</p>
							</a>
						</li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/menu/discount') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cài đặt giảm giá</p>
                            </a>
                        </li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-store-alt"></i>
						<p>
							Sản Phẩm
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('/admin/products/list') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Danh sách Sản Phẩm</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/products/add') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Thêm Sản Phẩm</p>
							</a>
						</li>
					</ul>
				</li>
                <li class="nav-item">
					<a href="#" class="nav-link">
                        <i class="nav-icon far fa-images"></i>
						<p>
							Slider
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('/admin/sliders/list') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Danh Sách Slider</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/sliders/add') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Thêm Slider</p>
							</a>
						</li>
					</ul>
				</li>
                <li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa-solid fa-user-group"></i>
						<p>
							Người dùng
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('/admin/users/list') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Danh sách người dùng</p>
							</a>
						</li>
					</ul>
				</li>
                <li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa-solid fa-box-open"></i>
						<p>
							Đơn hàng
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('/admin/orders/list') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Danh sách Đơn Hàng</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
