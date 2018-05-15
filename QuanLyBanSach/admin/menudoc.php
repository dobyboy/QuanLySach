
        <!-- Left Panel -->
<aside id="left-panel" class="left-panel">
	<nav class="navbar navbar-expand-sm navbar-default">
		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="http://localhost:8080/QuanLyBanSach/admin/tongquan/tongquan.php"><img src="http://localhost:8080/QuanLyBanSach/image/hinh-anh-chung/cooltext281692997293395.png" alt="logo"></a>
			<a class="navbar-brand hidden" 
			href="http://localhost:8080/QuanLyBanSach/admin/tongquan/tongquan.php">
			<img src="http://localhost:8080/QuanLyBanSach/image/hinh-anh-chung/logo.png" alt="logo"></a>
		</div>
		<br>
		<div id="main-menu" class="main-menu collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<!-- thông báo -->
				<li>
					<a href="http://localhost:8080/QuanLyBanSach/admin/tongquan/tongquan.php"> <i class="menu-icon fa fa-dashboard"></i> Tổng quan </a>
				</li>
				
				<!-- Quản lý khuyến mãi -->
				<li>
					<a href="http://localhost:8080/QuanLyBanSach/admin/quanlykhuyenmai/quan-ly-khuyen-mai.php"> <i class="menu-icon fa  fa-gift"></i>Quản lý khuyến mãi</a>
				</li>
				<!-- Quản lý đơn hàng -->
				<li class="menu-item-has-children dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-newspaper-o"></i>Quản lý đơn hàng</a>
					<ul class="sub-menu children dropdown-menu">
						<li><i class="fa fa-check"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydonhang/duyetdonhang.php">Duyệt đơn hàng</a></li>
						<li><i class="fa fa-refresh"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydonhang/capnhatdonhang.php">Cập nhật đơn hàng</a></li>
						<li><i class="fa fa-history"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydonhang/xem-lich-su-don-hang.php">Xem lịch sử đơn hàng</a></li>
					</ul>
				</li>	
					
				<!-- Quản lý danh mục sách -->
				<li class="menu-item-has-children dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Quản lý danh mục sách</a>
					<ul class="sub-menu children dropdown-menu">
						<li><i class="fa fa-book"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydanhmucsach/quan-ly-sach.php">Quản lý sách</a></li>
						<li><i class="fa  fa-list"></i><a href="../../admin/quanlydanhmucsach/quan-ly-loai-sach.php">quản lý loại sách</a></li>
						<li><i class="fa fa-university"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydanhmucsach/quan-ly-nha-xuat-ban.php">quản lý nhà xuất bản</a></li>
						<li><i class="fa fa-users"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydanhmucsach/quan-ly-tac-gia.php">Quản lý tác giả</a></li>
						<li><i class="fa fa-users"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydanhmucsach/quan-ly-dich-gia.php">Quản lý dịch giả</a></li>
						<li><i class="fa fa-picture-o"></i><a href="http://localhost:8080/QuanLyBanSach/admin/quanlydanhmucsach/quan-ly-hinh-anh.php">Quản lý hình ảnh</a></li>
					</ul>
				</li>	

				<!-- Quản lý kho -->
				<li>
					<a href="http://localhost:8080/QuanLyBanSach/admin/quanlykho/quan-ly-kho.php"> <i class="menu-icon fa fa-database"></i>Quản lý kho</a>
				</li>
				
				<!-- Quản lý nhập hàng -->
				<li>
					<a href="http://localhost:8080/QuanLyBanSach/admin/quanlynhaphang/quan-ly-nhap-hang.php"> <i class="menu-icon fa fa-download"></i>Quản lý nhập hàng</a>
				</li>

				<!-- Quản lý nhà cung cấp -->
				<li>
					<a href="http://localhost:8080/QuanLyBanSach/admin/quanlynhacungcap/quan-ly-nha-cung-cap.php"> <i class="menu-icon fa fa-university"></i>Quản lý nhà cung cấp</a>
				</li>

				<!-- Quản lý tài khoản  -->
				<li class="menu-item-has-children dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Quản lý tài khoản</a>
					<ul class="sub-menu children dropdown-menu">
						<li><i class="fa fa-users"></i><a href="#">Tài khoản nhân viên</a></li>
						<li><i class="fa  fa-shopping-cart"></i><a href="#">Tài khoản khách hàng</a></li>
					</ul>
				</li>	
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
</aside><!-- /#left-panel -->