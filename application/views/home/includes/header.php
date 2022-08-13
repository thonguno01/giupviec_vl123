<!-- Bat dau header -->
<div class="box_header">
        <div class="header">
<<<<<<< HEAD
            <div class="left"><a href="https://vieclam123.vn/"><img
                            src="/images/return_arrow.svg" alt=""></button>
                <div class="logo">
                    <a href="https://vieclam123.vn/"><img src="/images/logo_vieclam123.png" alt=""></a>
                </div>
            </div>
            <div class="center">
                <div class="logo logo_main">
				<a href="https://vieclam123.vn/"><img src="/images/logo_vieclam123.png" alt=""></a>
                </div>
                <div class="logo logo_login">
				<a href="https://vieclam123.vn/"><img src="/images/logo_vieclam123.png" alt=""></a>
                </div>
                <div class="link-bar">
                    <a href="/">Trang chủ</a>
                    <a href="/tim-giup-viec-gvt0c0d0.html">Tìm người giúp việc</a>
                    <a href="/tim-viec-lam-giup-viec-vlt0c0d0.html">Việc làm giúp việc</a>
                    <a href="/tim-giup-viec-quanh-day.html">Giúp việc quanh đây</a>
=======
            <div class="left"><button onclick="history.back()"><img
                            src="/images/return_arrow.svg" alt=""></button>
                <div class="logo">
                    <img src="/images/logo_vieclam123.png" alt="">
                </div>
            </div>
            <div class="center">
                <div class="logo">
                    <img src="/images/logo_vieclam123.png" alt="">
                </div>
                <div class="link-bar">
                    <a href="#">Trang chủ</a>
                    <a href="#">Tìm người giúp việc</a>
                    <a href="#">Việc làm giúp việc</a>
                    <a href="#">Giúp việc quanh đây</a>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                    <a href="#">Cẩm nang giúp việc</a>
                </div>
            </div>
            <div class="right">
                <div class="btn-search">
                    <button id="btn_search" onclick="open_search()"><img
                                src="/images/btn_search.svg"
                                alt=""></button>
                </div>
                <div class="notify">
                    <button id="notify">
                            <img src="/images/noti_icon.svg" alt="thong bao">
<<<<<<< HEAD
                        </button>
                    <div class="popup_notify" hidden>
                        <div class="content" id="noti_list">
                            <!-- <div class="noti_item">
=======
                            <div class="notify_num"><span>1</span></div>
                        </button>
                    <div class="popup_notify" hidden>
                        <div class="content">
                            <div class="noti_item">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                                <div class="avt">
                                    <img src="/images/box_employee.png" alt="anh dai dien">
                                </div>
                                <div class="noti_content">
                                    <div class="noti"><span class="name">Nguyễn
                                                Xuân Hòa</span><span> đã đánh
                                                giá công việc của bạn.</span></div>
                                    <div class="time"><span>3 giờ trước</span></div>
                                </div>
                                <div class="btn_delete">
<<<<<<< HEAD
                                    <button onclick="delete_noti()"><img
=======
                                    <button><img
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                                                src="/images/noti_delete_icon.svg"
                                                alt="xoa thong bao"></button>
                                </div>
                            </div>
                            <div class="noti_item">
                                <div class="avt">
                                    <img src="/images/box_employee.png" alt="anh dai dien">
                                </div>
                                <div class="noti_content">
                                    <div class="noti"><span class="name">Nguyễn
                                                Xuân Hòa</span><span> đã đánh
                                                giá công việc của bạn.</span></div>
                                    <div class="time"><span>3 giờ trước</span></div>
                                </div>
                                <div class="btn_delete">
                                    <button><img
                                                src="/images/noti_delete_icon.svg"
                                                alt="xoa thong bao"></button>
                                </div>
                            </div>
                            <div class="noti_item">
                                <div class="avt">
                                    <img src="/images/box_employee.png" alt="anh dai dien">
                                </div>
                                <div class="noti_content">
                                    <div class="noti"><span class="name">Nguyễn
                                                Xuân Hòa</span><span> đã đánh
                                                giá công việc của bạn.</span></div>
                                    <div class="time"><span>3 giờ trước</span></div>
                                </div>
                                <div class="btn_delete">
                                    <button><img
                                                src="/images/noti_delete_icon.svg"
                                                alt="xoa thong bao"></button>
                                </div>
<<<<<<< HEAD
                            </div> -->

                        </div>
                        <div class="bottom_box">
                            <button onclick="clear_notify()">Xóa thông báo</button>
=======
                            </div>

                        </div>
                        <div class="bottom_box">
                            <button>Xóa thông báo</button>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                        </div>
                    </div>
                </div>
                <div class="user">
                    <button id="user">
<<<<<<< HEAD
                            <img src="<?
							if(isset($_SESSION['user'])){
							if($_SESSION['user']['user_type']==0 && $_SESSION['user']['image']) echo rewirte_user_img_href($_SESSION['user']['id'],$_SESSION['user']['image']);
							elseif($_SESSION['user']['user_type']==1 && $_SESSION['user']['image']) echo rewirte_company_img_href($_SESSION['user']['id'],$_SESSION['user']['image']);
							else echo '/images/logo_vieclam123.png';
							}
							?>" alt="tai khoan">
                        </button>
                    <div class="box_popup_user" hidden>
                        <div class="popup_user">
							<?if(isset($_SESSION['user'])&&$_SESSION['user']['user_type']==0){?>
                            <a href="<?='profile-'.$_SESSION['user']['alias'].'-pgv'.$_SESSION['user']['id'].'.html'?>">Trang cá nhân</a>
							<?}?>
                            <a href="/account-manager">Quản lý tài khoản</a>
                            <button onclick="logout()">Đăng xuất</button>
=======
                            <img src="/images/user-ex.png" alt="tai khoan">
                        </button>
                    <div class="box_popup_user" hidden>
                        <div class="popup_user">
                            <a href="#">Trang cá nhân</a>
                            <a href="#">Quản lý tài khoản</a>
                            <a href="#">Đăng xuất</a>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                        </div>
                    </div>
                </div>
                <div class="menu_pc">
                    <span><a href="/login">Đăng nhập</a></span>
                    <span>/</span>
                    <span><a href="/register">Đăng ký</a></span>
                </div>
                <div class="menu_mb">
                    <button id="show_popup_menu"><img src="/images/menu.svg"
                                alt=""></button>
                </div>
            </div>
        </div>
        <!-- thanh tim kiem -->
        <div class="search_box">
<<<<<<< HEAD
		<form method="GET" onsubmit="return false">
            <div class="search_bar">	
                <div class="box_inp">
                    <input type="text" id="search_key" placeholder="<?if(isset($search_placeholder)) echo $search_placeholder; else echo 'Nhập từ khóa muốn tìm kiếm...';?>" autocomplete="off">
					<input hidden id="tag_id" value="0">
=======
            <div class="search_bar">
                <div class="box_inp">
                    <input type="text" placeholder="Nhập từ khóa tìm kiếm người giúp việc...">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                </div>
                <div class="box_select">
                    <img src="/images/location_icon.svg" alt="dia chi">
                    <button type="button" onclick="opend_location()">
<<<<<<< HEAD
                            <input name="location" id="display_location" placeholder="Tất cả địa điểm" disabled>
                            <img src="/images/arrow_down.svg" alt="">
                    </button>
                </div>
                <div class="box_btn">
                    <button id="action_search" type="submit"><img src="/images/btn_search.svg" alt="nut tim
=======
                            <input name="location" id="" placeholder="Tất cả địa
                                điểm" disabled>
                            <img src="/images/arrow_down.svg" alt="">
                        </button>
                </div>
                <div class="box_btn">
                    <button><img src="/images/btn_search.svg" alt="nut tim
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                                kiem"></button>
                    <button id="close_search"><img src="/images/close_icon.svg"
                                alt="nut dong"></button>
                </div>
            </div>
<<<<<<< HEAD
		</form>
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
            <div class="search_location_popup">
                <div class="box_hot">
                    <p class="title">Địa điểm nổi bật</p>
                    <div class="location">
<<<<<<< HEAD
						<input hidden value="0" id="district_id">
                        <div class="col" id="location_col_1">
                            <p class="province">Hà Nội</p>
                            <button type="button" value="72" class="district">Hai Bà Trưng</button>
                            <button type="button" value="70" class="district">Cầu Giấy</button>
                            <button type="button" value="78" class="district">Nam Từ Liêm</button>
                            <button type="button" value="69" class="district">Long biên</button>
                            <button type="button" value="74" class="district">Thanh Xuân</button>
                            <button type="button" value="73" class="district">Hoàng Mai</button>
                        </div>
                        <div class="col" id="location_col_2">
                            <p class="province">Hồ Chí Minh</p>
                            <button type="button" value="636" class="district">Huyện Bình Chánh</button>
                            <button type="button" value="638" class="district">Huyện Cần Giờ</button>
                            <button type="button" value="615" class="district">Quận 1</button>
                            <button type="button" value="624" class="district">Quận 2</button>
                            <button type="button" value="629" class="district">Quận 5</button>
                            <button type="button" value="626" class="district">Quận 10</button>
                        </div>
                        <div class="col" id="location_col_3">
                            <p class="province">Đà Nẵng</p>
                            <button type="button" value="427" class="district">Huyện Cẩm Lệ</button>
                            <button type="button" value="424" class="district">Huyện Hải Châu</button>
                            <button type="button" value="428" class="district">Huyện Hòa Vang</button>
                            <button type="button" value="422" class="district">Quận Liên Chiểu</button>
                            <button type="button" value="426" class="district">Quận Ngũ Hành Sơn</button>
                            <button type="button" value="423" class="district">Quận Thanh Khê</button>
=======
                        <div class="col">
                            <p class="province">Hà Nội</p>
                            <p class="district">Hai Bà Trưng</p>
                            <p class="district">Cầu Giấy</p>
                            <p class="district">Bắc Từ Liêm</p>
                        </div>
                        <div class="col">
                            <p class="province">Hồ Chí Minh</p>
                            <p class="district">Hai Bà Trưng</p>
                            <p class="district">Cầu Giấy</p>
                            <p class="district">Bắc Từ Liêm</p>
                        </div>
                        <div class="col">
                            <p class="province">Đà Nẵng</p>
                            <p class="district">Hai Bà Trưng</p>
                            <p class="district">Cầu Giấy</p>
                            <p class="district">Quận Ngũ Hành Sơn</p>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                        </div>
                    </div>
                </div>
                <div class="box_select">
                    <p class="title">Danh sách địa điểm</p>
                    <div class="location">
                        <select class="select_province" name="" id="select_province">
<<<<<<< HEAD
                                <option value="0">Tất cả tỉnh thành</option>
=======
                                <option>Tất cả tỉnh thành</option>
                                <option>Hà Nội</option>
                                <option>Hồ Chí Minh</option>
                                <option>Đà Nẵng</option>
                                <option>Hải Phòng</option>
                                <option>Hải Phòng</option>
                                <option>Hải Phòng</option>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                            </select>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
			<!-- <div class="search_autocomplete">
				<p class="item">Giúp việc theo giờ</p>
				<p class="item">Giúp việc theo giờ</p>
				<p class="item">Giúp việc theo giờ</p>
			</div> -->
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
            <div class="search_location_popup_mb">
                <div class="block_province" id="search_block_province" hidden>
                    <div class="box_list">
                        <button class="row">Hà Nội</button>
                        <button class="row">Hồ Chí Minh</button>
                        <button class="row">Đà Nẵng</button>
                        <button class="row">Hải Phòng</button>
                        <button class="row">Nam Định</button>
                        <button class="row">Thái Bình</button>
                        <button class="row">Ninh Bình</button>
                        <button class="row">Tuyên Quang</button>
                        <button class="row">Lạng Sơn</button>
                        <button class="row">Cao Bằng</button>
                        <button class="row">Cần Thơ</button>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="block_district" id="search_block_district">
=======
                <div class="block_district">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                    <button class="back"><span><img
                                    src="/images/arrow_back.svg" alt="quay lai"></span><span>Quay
                                lại</span></button>
                    <div class="box_list">
                        <button class="row">Hai Bà Trưng</button>
                        <button class="row">Đống Đa</button>
                        <button class="row">Cầu Giấy</button>
                        <button class="row">Bắc Từ Liêm</button>
                        <button class="row">Hà Đông</button>
                        <button class="row">Ba Đình</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- het thanh tim kiem -->
    </div>
    <!-- popup menu man mobile -->
    <div class="popup_menu_mb" hidden>
<<<<<<< HEAD
        <?if(isset($_SESSION['user'])){?>
		<div id="profile" class="profile">
            <div class="border">
            <img src="<?if(isset($_SESSION['user'])){
							if($_SESSION['user']['user_type']==0 && $_SESSION['user']['image']) echo rewirte_user_img_href($_SESSION['user']['id'],$_SESSION['user']['image']);
							elseif($_SESSION['user']['user_type']==1 && $_SESSION['user']['image']) echo rewirte_company_img_href($_SESSION['user']['id'],$_SESSION['user']['image']);
							else echo '/images/logo_vieclam123.png';
							}?>" alt="anh dai dien">
                            </div>
            <p><?=$_SESSION['user']['email']?></p>
        </div>
		<div id="main_menu" class="menu">
			<a href="/">Trang chủ</a>
            <a href="/tim-giup-viec-gvt0c0d0.html">Tìm người giúp việc</a>
            <a href="/tim-viec-lam-giup-viec-vlt0c0d0.html">Việc làm giúp việc</a>
            <a href="/tim-giup-viec-quanh-day.html">Giúp việc quanh đây</a>
            <a href="#">Cẩm nang giúp việc</a>
        </div>
        <div id="menu_user" class="menu">
            <?if(isset($_SESSION['user'])&&$_SESSION['user']['user_type']==0){?>
                            <a href="<?='profile-'.$_SESSION['user']['alias'].'-pgv'.$_SESSION['user']['id'].'.html'?>">Trang cá nhân</a>
							<?}?>
            <a href="/account-manager">Quản lý tài khoản</a>
            <button onclick="logout()">Đăng xuất</button>
        </div>
		<?}
		else{?>
		<div id="menu_login" class="menu">
            <a href="/login">Đăng nhập</a>
            <a href="/register">Đăng ký</a>
			<a href="/">Trang chủ</a>
        </div>
		<div id="main_menu" class="menu">
			<a href="/tim-giup-viec-gvt0c0d0.html">Tìm người giúp việc</a>
            <a href="/tim-viec-lam-giup-viec-vlt0c0d0.html">Việc làm giúp việc</a>
            <a href="/tim-giup-viec-quanh-day.html">Giúp việc quanh đây</a>
            <a href="#">Cẩm nang giúp việc</a>
        </div>
		<?}?>
    </div>
    <!-- het popup menu man mobile -->
    <!-- popup yeu cau dang nhap -->
    <div class="bg_popup_login" hidden>
    	<div class="login_popup">
    		<button id="close_popup_login" class="close_popup"><img src="/images/close_login_popup.svg" alt="dong popup"></button>
    		<div class="logo"><img src="/images/logo_vieclam123.png" alt="logo"></div>
    		<div class="text">
    			<p>Đăng nhập để tương tác với nhiều bài viết tại <span><a>giupviec.vieclam123.vn</a></span></p>
    		</div>
    		<div class="btn_box">
    			<p>Bạn là...</p>
    			<a class="login_employee" href="/login/employee">Người giúp việc đăng nhập</a>
    			<a class="login_company" href="/login/company">Người tuyển dụng đăng nhập</a>
    		</div>
    		<div class="box_bottom">
    			<p>Bạn chưa có tài khoản?</p>
    			<a href="/register">Đăng ký ngay</a>
    		</div>
    	</div>
    </div>
    <!-- het popup yeu cau dang nhap -->
	<!-- loading frame  -->
	<!-- <div class="loading_frame" id="loading_frame">
		<div class="frame">
		<img src="/images/loading.gif" alt="loading">
		</div>
	</div> -->
	<!-- het loading frame  -->
=======
        <div id="profile" class="profile">
            <img src="/images/profile_avt.png" alt="anh dai dien">
            <p>akdakdakh@gmail.com</p>
        </div>
        <div id="menu_login" class="menu">
            <a>Đăng nhập</a>
            <a>Đăng ký</a>
        </div>
        <div class="menu">
            <a>Trang chủ</a>
            <a>Tìm người giúp việc</a>
            <a>Việc làm giúp việc</a>
            <a>Giúp việc quanh đây</a>
            <a>Cẩm nang giúp việc</a>
        </div>
        <div id="menu_user" class="menu">
            <a>Trang cá nhân</a>
            <a>Quản lý tài khoản</a>
            <a>Đăng xuất</a>
        </div>

    </div>
    <!-- het popup menu man mobile -->

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    <!-- Ket thuc header -->
