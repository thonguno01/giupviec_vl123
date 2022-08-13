
    <!-- Bat dau noi dung -->
    <div class="main_content">
        <!-- bat dau box left -->
        <div class="box_left">
<<<<<<< HEAD
		<div class="profile">
		<div class="avt">
				<div class="box_img">
					<div class="avata" id="show_avata">
						<? if ($company['image'] != '') { ?>
							<img src="<?= rewirte_company_img_href($company['id'], $company['image']) ?>" alt="anh dai dien">
						<? } else { ?>
							<img src="/images/logo_vieclam123.png" alt="anh dai dien">
						<? } ?>
					</div>

				</div>
				<button type="button"><img src="/images/upload_img.svg" alt="tai anh len">
					<input id="change_avata" type="file">
				</button>
			</div>
			<div class="info">
				<p class="name"><?=$company['name']?></p>
				<p class="id">ID: <?=$company['id']?></p>
				<p class="point">Điểm xem miễn phí hôm nay: <?=$company['point_free']+$company['point_pay']?></p>
			</div>
		</div>
		<div class="menu_manager">
			<div class="btn_post">
				<button id="new_post">Đăng tin tuyển dụng</button>
			</div>
			<button id="general" class="active">Quản lý chung</button>
			<button id="post">Đăng tin tuyển giúp việc</button>
			<button id="list_post">Tin đã đăng</button>
			<button id="list_apply">Người giúp việc đã ứng tuyển</button>
			<button id="list_accept">Người giúp việc đã nhận việc</button>
			<button id="list_save">Người giúp việc đã lưu</button>
			<button id="list_from_filter">Người giúp việc từ điểm lọc</button>
			<button id="profile_detail">Thông tin cá nhân</button>
			<button id="change_password">Đổi mật khẩu</button>
			<button onclick="logout_action()" id="log_out">Đăng xuất</button>
		</div>
		<div class="btn_collapse">
			<button type="button" id="collapse_profile"><img src="/images/btn_collapse_col.svg" alt="thu gon"></button>
		</div>
	</div>
=======
            <div class="profile">
                <div class="avt">
                    <div class="box_img">
                        <img src="/images/logo_vieclam123.png" alt="anh
                                dai dien">
                        <button type="button"><img
                                    src="/images/upload_img.svg" alt="tai
                                    anh len"></button>
                    </div>
                </div>
                <div class="rate_star">
                    <span class="score">
                            <div class="score-wrap">
                                <span class="stars-active"
                                    style="width:80%">
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                </span>
                    <span class="stars-inactive">
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                    <i class="fa fa-star"
                                        aria-hidden="true"></i>
                                </span>
                </div>
                </span>
            </div>
            <div class="info">
                <p class="name">Vũ Thị Yến</p>
                <p class="id">ID: 1045</p>
                <p class="point">Điểm xem miễn phí hôm nay: 5</p>
            </div>
        </div>
        <div class="menu_manager">
            <div class="btn_post">
                <button>Đăng tin tuyển dụng</button>
            </div>
            <button id="general" class="active">Quản lý chung</button>
            <button id="post">Đăng tin tuyển giúp việc</button>
            <button id="list_post">Tin đã đăng</button>
            <button id="list_apply">Người giúp việc đã ứng tuyển</button>
            <button id="list_accept">Người giúp việc đã nhận việc</button>
            <button id="list_save">Người giúp việc đã lưu</button>
            <button id="list_from_filter">Người giúp việc từ điểm lọc</button>
            <button id="profile_detail">Thông tin cá nhân</button>
            <button id="change_password">Đổi mật khẩu</button>
            <button onclick="logout_action()" id="log_out">Đăng xuất</button>
        </div>
        <div class="btn_collapse">
            <button type="button" id="collapse_profile"><img src="/images/btn_collapse_col.svg" alt="thu gon"></button>
        </div>
    </div>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    <!-- het box left -->
    <div class="box_dynamic">
        <!-- bat dau quan ly chung -->
        <div class="block_general">
            <div class="box_top">
                <div class="box_item">
                    <img src="/images/job_apply.png" alt="cong viec ung
                                tuyen">
                    <div class="text">
                        <p class="title">Người giúp việc đã ứng tuyển</p>
                        <p class="content">15 ứng viên</p>
                    </div>
                </div>
                <div class="box_item">
                    <img src="/images/job_accept.png" alt="cong viec da
                                chap nhan">
                    <div class="text">
                        <p class="title">Người giúp việc đã nhận việc</p>
                        <p class="content">15 ứng viên</p>
                    </div>
                </div>
                <div class="box_item">
                    <img src="/images/job_save.png" alt="cong viec da
                                luu">
                    <div class="text">
                        <p class="title">Người giúp việc đã lưu</p>
                        <p class="content">15 ứng viên</p>
                    </div>
                </div>
            </div>
            <!-- 1 list job -->
            <div class="box_content">
                <div class="top">
                    <p class="title">Tin tuyển dụng đã đăng</p>
                    <button>Xem tất cả</button>
                </div>
                <div class="data_table">
                    <div class="row thead">
                        <p class="job_id">Mã công việc</p>
                        <p class="job_title">Tiêu đề</p>
                        <p class="job_location">Địa chỉ làm việc</p>
                        <p class="job_salary">Mức lương</p>
                        <p class="post_status">Trạng thái</p>
                        <p class="job_edit">Sửa tin</p>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>

                </div>
                <div class="btn_post">
                    <button>Đăng tin mới ngay</button>
                </div>
            </div>
            <!-- het 1 list job -->
        </div>
        <!-- het quan ly chung -->
        <!-- danh sach tin tuyen dung da dang -->
        <div class="posted_list" hidden>
            <div class="box_content">
                <div class="top">
                    <p class="title">Tin tuyển dụng đã đăng</p>
                </div>
                <div class="data_table">
                    <div class="row thead">
                        <p class="job_id">Mã công việc</p>
                        <p class="job_title">Tiêu đề</p>
                        <p class="job_location">Địa chỉ làm việc</p>
                        <p class="job_salary">Mức lương</p>
                        <p class="post_status">Trạng thái</p>
                        <p class="job_edit">Sửa tin</p>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>
                    <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div>

                </div>
                <div class="pagination_box">
                    <div class="pagination">
                        <ul>
                            <li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
                            <li class="active">1</li>
                            <li><img src="/images/pagination_next.svg" alt="nut tien"></li>
                        </ul>
                    </div>
                    <span class="total_page"> of 67</span>
                </div>
            </div>
        </div>
        <!-- het danh sach tin tuyen dung da dang -->
        <!-- danh sach nguoi giup viec da ung tuyen -->
        <div class="list_candidate" hidden>
            <div class="box_content">
                <p class="title">NGƯỜI GIÚP VIỆC ĐÃ ỨNG TUYỂN</p>
                <div class="data_table">
                    <div class="row thead">
                        <p class="candidate_name">Họ và tên</p>
                        <p class="candidate_id">Mã ứng viên</p>
                        <p class="job_title">Tiêu đề</p>
                        <p class="job_salary">Mức lương</p>
                        <p class="job_start">Ngày bắt đầu công việc</p>
                        <p class="candidate_action">Hành động</p>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="candidate_id">ID 001 </p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <p class="job_start">24/12/2022</p>
                        <div class="candidate_action">
                            <button class="accept" onclick="accept_action(1)">Chấp nhận</button>
                            <button class="refuse" onclick="refuse_action(2)">Từ chối</button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="candidate_id">ID 001 </p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <p class="job_start">24/12/2022</p>
                        <div class="candidate_action">
                            <p class="refuse">Đã từ chối</p>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="candidate_id">ID 001 </p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <p class="job_start">24/12/2022</p>
                        <div class="candidate_action">
                            <button class="accept" onclick="accept_action(1)">Chấp nhận</button>
                            <button class="refuse" onclick="refuse_action(2)">Từ chối</button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="candidate_id">ID 001 </p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <p class="job_start">24/12/2022</p>
                        <div class="candidate_action">
                            <p class="accept">Đã chấp nhận</p>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="candidate_id">ID 001 </p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <p class="job_start">24/12/2022</p>
                        <div class="candidate_action">
                            <button class="accept" onclick="accept_action(1)">Chấp nhận</button>
                            <button class="refuse" onclick="refuse_action(2)">Từ chối</button>
                        </div>
                    </div>
                </div>
                <div class="pagination_box">
                    <div class="pagination">
                        <ul>
                            <li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
                            <li class="active">1</li>
                            <li><img src="/images/pagination_next.svg" alt="nut tien"></li>
                        </ul>
                    </div>
                    <span class="total_page"> of 67</span>
                </div>
            </div>
        </div>
        <!-- het danh sach nguoi giup viec da ung tuyen -->
        <!-- danh sach nguoi giup viec da nhan viec -->
        <div class="list_employee_accept" hidden>
            <div class="box_content">
                <p class="title">Danh sách người giúp việc đã nhận việc</p>
                <div class="data_table">
                    <div class="row thead">
                        <p class="candidate_name">Họ và tên</p>
                        <p class="job_title">Tiêu đề</p>
                        <p class="job_location">Địa chỉ làm việc</p>
                        <p class="job_salary">Mức lương</p>
                        <p class="job_status">Trạng thái</p>
                        <p class="job_rate">Đánh giá</p>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <div class="job_status">
                            <button class="change_job_status">
                            <span class="text working">Đang làm</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="not_start selected">Chưa bắt đầu</button>
                                <button class="working">Đang làm</button>
                                <button class="done">Kết thúc</button>
                            </div>
                        </div>
                        <div class="job_rate">
                            <button class="open_rate_btn" disabled><img src="/images/employee_rate_disable.svg" alt="danh gia"></button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <div class="job_status">
                            <button class="change_job_status">
                            <span class="text working">Đang làm</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="not_start selected">Chưa bắt đầu</button>
                                <button class="working">Đang làm</button>
                                <button class="done">Kết thúc</button>
                            </div>
                        </div>
                        <div class="job_rate">
                            <button class="open_rate_btn" disabled><img src="/images/employee_rate_disable.svg" alt="danh gia"></button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <div class="job_status">
                            <button class="change_job_status">
                            <span class="text done">Kết thúc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="not_start">Chưa bắt đầu</button>
                                <button class="working">Đang làm</button>
                                <button class="done selected">Kết thúc</button>
                            </div>
                        </div>
                        <div class="job_rate">
                            <button class="open_rate_btn" onclick="rate_action(3)"><img src="/images/employee_rate.svg" alt="danh gia"></button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="candidate_name">Nguyễn Khánh Linh</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>
                        <div class="job_status">
                            <button class="change_job_status">
                            <span class="text working">Đang làm</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="not_start selected">Chưa bắt đầu</button>
                                <button class="working">Đang làm</button>
                                <button class="done">Kết thúc</button>
                            </div>
                        </div>
                        <div class="job_rate">
                            <span class="score">
                                <div class="score-wrap">
                                    <span class="stars-active"
                                        style="width:80%">
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                    </span>
                            <span class="stars-inactive">
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star"
                                            aria-hidden="true"></i>
                                    </span>
                        </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="pagination_box">
                <div class="pagination">
                    <ul>
                        <li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
                        <li class="active">1</li>
                        <li><img src="/images/pagination_next.svg" alt="nut tien"></li>
                    </ul>
                </div>
                <span class="total_page"> of 67</span>
            </div>
        </div>
    </div>
    <!-- het danh sach nguoi giup viec da nhan viec -->
    <!-- danh sach nguoi giup viec da luu -->
    <div class="list_save" hidden>
        <div class="box_content">
            <p class="title">Danh sách người giúp việc đã lưu</p>
            <div class="employee_container">
                <div class="box_employee">
                    <div class="employee">
                        <div class="box_top">
                            <div class="profile">
                                <img src="/images/bg_login.png" alt="anh
                                        dai dien">
                                <div class="star">
                                    <span class="score">
                        <div class="score-wrap">
                            <span class="stars-active" style="width:80%">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                                    <span class="stars-inactive">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                                </div>
                                </span>
                            </div>
                        </div>
                        <div class="box_inf">
                            <p class="name">Đinh Thị Liên</p>
                            <div class="row">
                                <div class="icon icon_location">
                                    <img src="/images/location_icon.svg" alt="dia diem">
                                </div>
                                <div class="text">
                                    <span>Hà Nội</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="icon icon_birthday">
                                    <img src="/images/birthday_icon.svg" alt="dia diem">
                                </div>
                                <div class="text">
                                    <span>46<span class="age"> tuổi</span></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="icon icon_exp">
                                    <img src="/images/exp_icon.svg" alt="dia diem">
                                </div>
                                <div class="text">
                                    <p><span class="exp">Kinh
                                                        nghiệm: </span>5 năm</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="icon icon_job_location">
                                    <img src="/images/job_location_icon.svg" alt="dia diem">
                                </div>
                                <div class="text">
                                    <span>Ở cùng chủ nhà</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box_bottom">
                        <div class="box_tag">
                            <span class="icon icon_job_tag">
                            <img src="/images/job_tag_icon.svg" alt="dia diem">
                        </span>
                            <span class="text">
                            <span>Công việc nhận làm: </span>
                            </span>
                            <span class="content">
                            Giúp việc theo giờ
                        </span>
                            <span>/</span>
                            <span class="content">
                            Chăm sóc người già, người bệnh
                        </span>
                            <span>/</span>
                            <span class="content">
                            Giúp việc theo giờ
                        </span>
                        </div>
                        <div class="box_schedule">
                            <span class="active">T2</span>
                            <span class="active">T3</span>
                            <span class="active">T4</span>
                            <span class="active">T5</span>
                            <span class="active">T6</span>
                            <span class="non-active">T7</span>
                            <span class="non-active">CN</span>
                        </div>
                    </div>
                    <div class="box_btn">
                        <button onclick="unsave_action(4)" class="white">Bỏ lưu</button>
                        <button class="blue">Xem chi tiết</button>
                    </div>
                </div>
            </div>
            <div class="box_employee">
                <div class="employee">
                    <div class="box_top">
                        <div class="profile">
                            <img src="/images/bg_login.png" alt="anh
                                    dai dien">
                            <div class="star">
                                <span class="score">
                    <div class="score-wrap">
                        <span class="stars-active" style="width:80%">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                                <span class="stars-inactive">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                            </div>
                            </span>
                        </div>
                    </div>
                    <div class="box_inf">
                        <p class="name">Đinh Thị Liên</p>
                        <div class="row">
                            <div class="icon icon_location">
                                <img src="/images/location_icon.svg" alt="dia diem">
                            </div>
                            <div class="text">
                                <span>Hà Nội</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="icon icon_birthday">
                                <img src="/images/birthday_icon.svg" alt="dia diem">
                            </div>
                            <div class="text">
                                <span>46<span class="age"> tuổi</span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="icon icon_exp">
                                <img src="/images/exp_icon.svg" alt="dia diem">
                            </div>
                            <div class="text">
                                <p><span class="exp">Kinh
                                                    nghiệm: </span>5 năm</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="icon icon_job_location">
                                <img src="/images/job_location_icon.svg" alt="dia diem">
                            </div>
                            <div class="text">
                                <span>Ở cùng chủ nhà</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_bottom">
                    <div class="box_tag">
                        <span class="icon icon_job_tag">
                        <img src="/images/job_tag_icon.svg" alt="dia diem">
                    </span>
                        <span class="text">
                        <span>Công việc nhận làm: </span>
                        </span>
                        <span class="content">
                        Giúp việc theo giờ
                    </span>
                        <span>/</span>
                        <span class="content">
                        Chăm sóc người già, người bệnh
                    </span>
                        <span>/</span>
                        <span class="content">
                        Giúp việc theo giờ
                    </span>
                    </div>
                    <div class="box_schedule">
                        <span class="active">T2</span>
                        <span class="active">T3</span>
                        <span class="active">T4</span>
                        <span class="active">T5</span>
                        <span class="active">T6</span>
                        <span class="non-active">T7</span>
                        <span class="non-active">CN</span>
                    </div>
                </div>
                <div class="box_btn">
                    <button onclick="unsave_action(4)" class="white">Bỏ lưu</button>
                    <button class="blue">Xem chi tiết</button>
                </div>
            </div>
        </div>
        <div class="box_employee">
            <div class="employee">
                <div class="box_top">
                    <div class="profile">
                        <img src="/images/bg_login.png" alt="anh
                                dai dien">
                        <div class="star">
                            <span class="score">
                <div class="score-wrap">
                    <span class="stars-active" style="width:80%">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                            <span class="stars-inactive">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                        </div>
                        </span>
                    </div>
                </div>
                <div class="box_inf">
                    <p class="name">Đinh Thị Liên</p>
                    <div class="row">
                        <div class="icon icon_location">
                            <img src="/images/location_icon.svg" alt="dia diem">
                        </div>
                        <div class="text">
                            <span>Hà Nội</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon icon_birthday">
                            <img src="/images/birthday_icon.svg" alt="dia diem">
                        </div>
                        <div class="text">
                            <span>46<span class="age"> tuổi</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon icon_exp">
                            <img src="/images/exp_icon.svg" alt="dia diem">
                        </div>
                        <div class="text">
                            <p><span class="exp">Kinh
                                                nghiệm: </span>5 năm</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icon icon_job_location">
                            <img src="/images/job_location_icon.svg" alt="dia diem">
                        </div>
                        <div class="text">
                            <span>Ở cùng chủ nhà</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_bottom">
                <div class="box_tag">
                    <span class="icon icon_job_tag">
                    <img src="/images/job_tag_icon.svg" alt="dia diem">
                </span>
                    <span class="text">
                    <span>Công việc nhận làm: </span>
                    </span>
                    <span class="content">
                    Giúp việc theo giờ
                </span>
                    <span>/</span>
                    <span class="content">
                    Chăm sóc người già, người bệnh
                </span>
                    <span>/</span>
                    <span class="content">
                    Giúp việc theo giờ
                </span>
                </div>
                <div class="box_schedule">
                    <span class="active">T2</span>
                    <span class="active">T3</span>
                    <span class="active">T4</span>
                    <span class="active">T5</span>
                    <span class="active">T6</span>
                    <span class="non-active">T7</span>
                    <span class="non-active">CN</span>
                </div>
            </div>
            <div class="box_btn">
                <button onclick="unsave_action(4)" class="white">Bỏ lưu</button>
                <button class="blue">Xem chi tiết</button>
            </div>
        </div>
    </div>
    </div>
    <div class="pagination_box">
        <div class="pagination">
            <ul>
                <li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
                <li class="active">1</li>
                <li><img src="/images/pagination_next.svg" alt="nut tien"></li>
            </ul>
        </div>
        <span class="total_page"> of 67</span>
    </div>
    </div>
    </div>
    <!-- het danh sach nguoi giup viec da luu -->
    <!-- danh sach nguoi giup viec tu diem loc -->
    <div class="list_from_filter" hidden>
        <div class="box_content">
            <p class="title">Danh sách người giúp việc từ điểm lọc</p>
            <div class="data_table">
                <div class=" row thead">
                    <p class="candidate_name">Họ và tên</p>
                    <p class="candidate_id">Mã ứng viên</p>
                    <p class="candidate_location">Địa chỉ</p>
                    <p class="candidate_contact">Email và SĐT</p>
                    <p class="candidate_salary">Mức lương</p>
                    <p class="filter_date">Ngày lọc</p>
                    <p class="candidate_status">Trạng thái</p>
                    <p class="candidate_note">Ghi chú</p>
                </div>
                <div class="row">
                    <p class="candidate_name">Nguyễn Khánh Linh</p>
                    <p class="candidate_id">ID 001 </p>
                    <p class="candidate_location">Số 1 Minh Khai, Hai Bà Trưng, Hà Nội</p>
                    <p class="candidate_contact">
                        <span class="sdt">0987882878</span>
                        <span class="email">jhgjhj@gmail.com</span>
                    </p>
                    <p class="candidate_salary">8.000.000VNĐ /Tháng</p>
                    <p class="filter_date">11/12/2021</p>
                    <div class="candidate_status">
                        <button class="change_candidate_status">
                            <span class="text accept">Đã chấp nhận</span>
                            <span class="img"><img src="/images/arrow_bottom.svg" alt="mui ten"></span>
                        </button>
                        <div class="menu_status" style="display: none;">
                            <button class="accept selected">Đã chấp nhận</button>
                            <button class="refuse">Đã từ chối</button>
                            <button class="not_connect">Không liên lạc được</button>
                        </div>
                    </div>
                    <div class="candidate_note">
                        <button class="candidate_note_btn"><img src="/images/edit.svg" alt="ghi chu"></button>
                        <div class="popup_note" hidden>
                            <div class="popup_content">
                                <p class="title">Ghi chú</p>
                                <textarea class="content"></textarea>
                                <div class="confirm_button">
                                    <button class="yes" id="yes">Lưu ghi chú</button>
                                    <button class="no" id="no">Xóa ghi chú</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="candidate_name">Nguyễn Khánh Linh</p>
                    <p class="candidate_id">ID 001 </p>
                    <p class="candidate_location">Số 1 Minh Khai, Hai Bà Trưng, Hà Nội</p>
                    <p class="candidate_contact">
                        <span class="sdt">0987882878</span>
                        <span class="email">jhgjhj@gmail.com</span>
                    </p>
                    <p class="candidate_salary">8.000.000VNĐ /Tháng</p>
                    <p class="filter_date">11/12/2021</p>
                    <div class="candidate_status">
                        <button class="change_candidate_status">
                            <span class="text not_connect">Không liên lạc được</span>
                            <span class="img"><img src="/images/arrow_bottom.svg" alt="mui ten"></span>
                        </button>
                        <div class="menu_status" style="display: none;">
                            <button class="accept">Đã chấp nhận</button>
                            <button class="refuse">Đã từ chối</button>
                            <button class="not_connect selected">Không liên lạc được</button>
                        </div>
                    </div>
                    <div class="candidate_note">
                        <button class="candidate_note_btn"><img src="/images/edit.svg" alt="ghi chu"></button>
                        <div class="popup_note" hidden>
                            <div class="popup_content">
                                <p class="title">Ghi chú</p>
                                <textarea class="content"></textarea>
                                <div class="confirm_button">
                                    <button class="yes" id="yes">Lưu ghi chú</button>
                                    <button class="no" id="no">Xóa ghi chú</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="candidate_name">Nguyễn Khánh Linh</p>
                    <p class="candidate_id">ID 001 </p>
                    <p class="candidate_location">Số 1 Minh Khai, Hai Bà Trưng, Hà Nội</p>
                    <p class="candidate_contact">
                        <span class="sdt">0987882878</span>
                        <span class="email">jhgjhj@gmail.com</span>
                    </p>
                    <p class="candidate_salary">8.000.000VNĐ /Tháng</p>
                    <p class="filter_date">11/12/2021</p>
                    <div class="candidate_status">
                        <button class="change_candidate_status">
                            <span class="text refuse">Đã từ chối</span>
                            <span class="img"><img src="/images/arrow_bottom.svg" alt="mui ten"></span>
                        </button>
                        <div class="menu_status" style="display: none;">
                            <button class="accept">Đã chấp nhận</button>
                            <button class="refuse selected">Đã từ chối</button>
                            <button class="not_connect">Không liên lạc được</button>
                        </div>
                    </div>
                    <div class="candidate_note">
                        <button class="candidate_note_btn"><img src="/images/edit.svg" alt="ghi chu"></button>
                        <div class="popup_note" hidden>
                            <div class="popup_content">
                                <p class="title">Ghi chú</p>
                                <textarea class="content"></textarea>
                                <div class="confirm_button">
                                    <button class="yes" id="yes">Lưu ghi chú</button>
                                    <button class="no" id="no">Xóa ghi chú</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination_box">
                <div class="pagination">
                    <ul>
                        <li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
                        <li class="active">2</li>
                        <li><img src="/images/pagination_next.svg" alt="nut tien"></li>
                    </ul>
                </div>
                <span class="total_page"> of 5</span>
            </div>
        </div>
    </div>
    <!-- het danh sach nguoi giup viec tu diem loc -->
    <!-- dang tin -->
    <div class="block_post" hidden>
        <div class="box_content">
            <p class="title">Đăng tin tuyển giúp việc</p>
            <form>
                <div class="form_input">
                    <div class="row">
                        <div class="center">
                            <label for="title">
                                <span>Tiêu đề</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="text" name="title" id="title" placeholder="Nhập tiêu đề tin tuyển dụng">
                            <p class="warning" id="error_title"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                                    <span>Loại hình dịch vụ</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="job_style[]" id="job_style" multiple="multiple">
                                    <option></option>
                                    <option value="1">Giúp việc theo giờ</option>
                                    <option value="2">Giúp việc văn phòng</option>
                                    <option value="3">Giúp việc chăm sóc trẻ em </option>
                                    <option value="4">Giúp việc gia đình</option>
                                </select>
                            <p class="warning" id="error_job_style"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                            <span>Tuổi</span>
                            <span class="warning">*</span>
                        </label>
                            <div id="menu_age" style="width:100%">
                                <input class="range_age" type="text" id="range_age">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="experience">
                                    <span>Kinh nghiệm</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="experience" id="experience">
                                    <option></option>
                                    <option value="1">Chưa có kinh nghiệm</option>
                                    <option value="2">Dưới 1 năm</option>
                                    <option value="3">1-2 năm</option>
                                    <option value="4">3-5 năm</option>
                                    <option value="5">6-9 năm</option>
                                    <option value="6">Trên 10 năm</option>
                                </select>
                            <p class="warning" id="error_experience"></p>
                        </div>
                        <div class="right">
                            <label for="education">
                                    <span>Trình độ học vấn</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="education" id="education">
                                    <option value="" selected></option>
                                    <option value="1">THCS</option>
                                    <option value="2">THPT</option>
                                    <option value="3">Cao đẳng</option>
                                    <option value="4">Đại học</option>
                                </select>
                            <p class="warning" id="error_education"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="province">
                                    <span>Tỉnh/Thành phố</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="province" id="province">
                                    <option value="" selected></option>
                                    <option value="1">Hà Nội</option>
                                    <option value="2">Nam Định</option>
                                </select>
                            <p class="warning" id="error_province"></p>
                        </div>
                        <div class="right">
                            <label for="district">
                                    <span>Quận/Huyện</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="district" id="district">
                                    <option value="" selected></option>
                                    <option value="1">Quận Hoàn Kiếm</option>
                                    <option value="2">Quận Hoàng Mai</option>
                                </select>
                            <p class="warning" id="error_district"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="address">
                                    <span>Địa chỉ cụ thể</span>
                                    <span class="warning">*</span>
                                </label>
                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể">
                            <p class="warning" id="error_address"></p>
                        </div>
                        <div class="right">
                            <label for="stay">
                                    <span>Ở cùng chủ nhà</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="stay" id="stay">
                                    <option value="1" selected>Ở cùng chủ nhà</option>
                                    <option value="2">Không ở cùng chủ nhà</option>
                                </select>
                            <p class="warning" id="error_district"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="address">
                                <span>Mức lương ước lượng</span>
                                <span class="warning">*</span>
                            </label>
                            <div class="sal_opt">
                                <input type="radio" name="sal_option" id="static_sal_btn" value="0" checked>
                                <input type="radio" name="sal_option" value="1" id="dynamic_sal_btn">
                                <label for="static_sal_btn" class="option static_sal_btn">
                                    <span>Cố định</span>
                                </label>
                                <label for="dynamic_sal_btn" class="option dynamic_sal_btn">
                                    <span>Ước lượng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row_sal dynamic_sal" id="sal_dynamic" style="display: none;">
                        <div class="left" id="dynamic">
                            <div class="sal_from">
                                <label for="sal_from">Từ</label>
                                <div>
                                    <input type="number" name="sal_from" id="sal_from">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                            <div class="sal_to">
                                <label for="sal_to">Đến</label>
                                <div>
                                    <input type="number" name="sal_to" id="sal_to">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_dynamic">
                                    <option value="1">Giờ</option>
                                    <option value="2">Tuần</option>
                                    <option value="3" selected>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <div class="row_sal static_sal" id="sal_static">
                        <div class="left" id="static">
                            <input type="number" name="sal" id="sal">
                            <div class="text"><span>VND</span></div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_static">
                                    <option value="1">Giờ</option>
                                    <option value="2">Tuần</option>
                                    <option value="3" selected>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <p class="warning" id="error_sal"></p>
                    <div class="row">
                        <div class="left">
                            <label for="day_start">
                                <span>Ngày bắt đầu làm việc</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="date" name="day_start" id="day_start">
                            <p class="warning" id="error_day_start"></p>
                        </div>
                        <div class="right">
                            <label for="day_close">
                                    <span>Thời hạn nhận việc</span>
                                    <span class="warning">*</span>
                                </label>
                            <input type="date" name="day_close" id="day_close">
                            <p class="warning" id="error_day_close"></p>
                        </div>
                    </div>
                    <!-- lich lam viec -->
                    <div class="row">
                        <div class="text">
                            <span><img src="/images/calendar_icon.svg" alt="lich lam viec"></span>
                            <span>Lịch làm việc</span>
                            <span class="warning">*</span>
                        </div>
                    </div>
                    <p class="warning" id="error_schedule"></p>
                    <div class="table_schedule">
                        <div class="schedule_row" id="t2">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T2</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t2')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t2_am">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="11:00">
                                <button id="add_t2" type="button" onclick="add_schedule_row('t2')"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t2_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="21:00">
                                <button type="button" id="minus_t2" onclick="minus_schedule_row('t2')"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t3">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T3</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t3')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t3_am">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="11:00">
                                <button id="add_t3" onclick="add_schedule_row('t3')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t3_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="21:00">
                                <button id="minus_t3" onclick="minus_schedule_row('t3')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t4">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T4</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t4')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t4_am">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="07:00" id="t4_am">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="11:00">
                                <button id="add_t4" onclick="add_schedule_row('t4')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t4_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="21:00">
                                <button id="minus_t4" onclick="minus_schedule_row('t4')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t5">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T5</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t5')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t5_am">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="11:00">
                                <button id="add_t5" onclick="add_schedule_row('t5')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t5_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="21:00">
                                <button id="minus_t5" onclick="minus_schedule_row('t5')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t6">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T6</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t6')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t6_am">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="11:00">
                                <button id="add_t6" onclick="add_schedule_row('t6')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t6_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" placeholder="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" placeholder="21:00">
                                <button id="minus_t6" onclick="minus_schedule_row('t6')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t7">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T7</div>
                                        <input type="checkbox" class="checkbox_schedule"  onchange="hide_schedule_row('t7')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="schedule_msg" id="schedule_msg_t7">Ngày nghỉ</div>
                        </div>
                        <div class="schedule_row" id="cn">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">CN</div>
                                        <input type="checkbox" class="checkbox_schedule"  onchange="hide_schedule_row('cn')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="schedule_msg" id="schedule_msg_cn">Ngày nghỉ</div>
                        </div>
                    </div>
                    <!-- het lich lam viec -->
                    <div class="row">
                        <div class="center">
                            <label for="job_detail"><span><img src="/images/job_detail.svg" alt="mo ta cong viec"></span><span>Mô tả công việc</span></label>
                            <textarea name="" id="job_detail" placeholder="Mô tả chi tiết công việc"></textarea>
                            <p class="warning" id="error_job_detail"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_require"><span><img src="/images/job_require.svg" alt="yeu cau cong viec"></span><span>Yêu cầu công việc</span></label>
                            <textarea name="" id="job_require" placeholder="Nhà tuyển dụng đặt ra những yêu cầu gì với người giúp việc?"></textarea>
                            <p class="warning" id="error_job_require"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_benefit"><span><img src="/images/job_benefit.svg" alt="yeu cau cong viec"></span><span>Quyền lợi</span></label>
                            <textarea name="" id="job_benefit" placeholder="Người giúp việc sẽ được hưởng những quyền lợi gì?"></textarea>
                            <p class="warning" id="error_job_benefit"></p>
                        </div>
                    </div>
                    <div class="box_btn">
                        <button class="update" onclick="submit_post()" type="button">Đăng tin</button>
                        <button class="reset_form" onclick="reset_form_post()" type="button">Cài đặt lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- het dang tin -->

    </div>
    <!-- bat dau box right -->
    <div class="box_right">
        <div class="calender">
            <div class="month_box">
                <img src="/images/calendar.svg" alt="lich">
                <p class="month"><span id="month">___</span><span> </span><span id="year">___</span></p>
                <div class="action_month">
                    <button id="prev_month"><img
                                        src="/images/calender_arrow_left_blue.svg"
                                        alt="prev"></button>
                    <button id="next_month"><img
                                        src="/images/calender_arrow_right_blue.svg"
                                        alt="next"></button>
                </div>
            </div>
            <div class="week_box">
                <p>Sun</p>
                <p>Mon</p>
                <p>Tue</p>
                <p>Wed</p>
                <p>Thu</p>
                <p>Fri</p>
                <p>Sat</p>
            </div>
            <div class="day_box">


            </div>

        </div>
        <div class="img">
            <img src="/images/calendar_img.png" alt="anh lich">
        </div>

    </div>
    <!-- het box right -->
    <!-- doi mat khau -->
    <div class="box_change_password" hidden>
        <div class="box_content">
            <p class="title">Đổi mật khẩu</p>
            <div class="box_img"><img src="/images/password_change_bg.png" alt="doi mat khau"></div>
            <div class="box_form">
                <div class="row">
                    <label for="current_pass"><span>Mật khẩu hiện tại (<span class="warning">*</span>)</span></label>
                    <span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
                    <input type="password" name="current_pass" id="current_pass">
                </div>
                <div class="row">
                    <label for="current_pass"><span>Mật khẩu mới (<span class="warning">*</span>)</span></label>
                    <span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
                    <input type="password" name="current_pass" id="new_pass">
                </div>
                <div class="row">
                    <label for="current_pass"><span>Nhập lại mật khẩu (<span class="warning">*</span>)</span></label>
                    <span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
                    <input type="password" name="current_pass" id="re_pass">
                </div>
                <button type="button">Đổi mật khẩu</button>
            </div>

        </div>
    </div>
    <!-- het doi mat khau -->

    <!-- thong tin ca nhan -->
    <div class="block_profile" hidden>
        <div class="box_content">
            <p class="title">THÔNG TIN CÁ NHÂN</p>
            <div class="form_input">
                <div class="row">
                    <div class="left">
                        <label for="profile_email">
                                    <span>Email</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_email" id="profile_email" placeholder="Nhập địa chỉ email">
                        <p class="warning" id="error_profile_email"></p>
                    </div>
                    <div class="right">
                        <label for="profile_phone">
                                    <span>Số điện thoại</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_phone" id="profile_phone" placeholder="Nhập số điện thoại">
                        <p class="warning" id="error_profile_phone"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="profile_name">
                                    <span>Họ và tên</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_name" id="profile_name" placeholder="Nhập họ và tên">
                        <p class="warning" id="error_profile_name"></p>
                    </div>
                    <div class="right">
                        <label for="profile_birthday">
                                    <span>Ngày sinh</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="date" name="profile_birthday" id="profile_birthday">
                        <p class="warning" id="error_profile_birthday"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="profile_province">
                                    <span>Tỉnh/Thành phố</span>
                                    <span class="warning">*</span>
                                </label>
                        <select name="profile_province" id="profile_province">
                                    <option value="" selected></option>
                                    <option value="1">Hà Nội</option>
                                    <option value="2">Nam Định</option>
                                </select>
                        <p class="warning" id="error_profile_province"></p>
                    </div>
                    <div class="right">
                        <label for="profile_district">
                                    <span>Quận/Huyện</span>
                                    <span class="warning">*</span>
                                </label>
                        <select name="profile_district" id="profile_district">
                                    <option value="" selected></option>
                                    <option value="1">Quận Hoàn Kiếm</option>
                                    <option value="2">Quận Hoàng Mai</option>
                                </select>
                        <p class="warning" id="error_profile_district"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <label for="profile_address">
                                    <span>Địa chỉ cụ thể</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_address" id="profile_address" placeholder="Nhập địa chỉ cụ thể">
                        <p class="warning" id="error_profile_address"></p>
                    </div>
                </div>
                <div class="box_btn">
                    <button class="update" onclick="update_profile()" type="button">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het thong tin ca nhan -->

    </div>
    </div>
    <!-- Ket thuc noi dung -->

    <!-- popup -->
    <!-- popup confirm logout -->
    <div class="confirm_logout">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn đăng xuất tài khoản này?</p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Đăng xuất</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm logout -->

    <!-- popup confirm bo ung tuyen -->
    <div class="confirm_unapply">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn bỏ ứng tuyển tin tuyển dụng này?</p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Bỏ ứng tuyển</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm bo ung tuyen -->

    <!-- popup confirm bo luu -->
    <div class="confirm_unsave">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn bỏ lưu ứng viên này? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Bỏ lưu</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm bo luu -->
    <!-- popup chap nhan ung vien -->
    <div class="confirm_accept">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn chấp nhận yêu cầu ứng tuyển của ứng viên này ? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Chấp nhận</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup chap nhan ung vien -->

    <!-- popup tu choi ung vien -->
    <div class="confirm_refuse">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn từ chối yêu cầu ứng tuyển của ứng viên này? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Từ chối</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup tu choi ung vien -->
    <!-- popup dang tin thanh cong -->
    <div class="popup_post_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Đăng tin thành công!</p>
                <div class="confirm_button">
                    <button onclick="close_post_success()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup dang tin thanh cong -->

    <!-- popup doi mat khau thanh cong -->
    <div class="popup_change_pwd_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Đổi mật khẩu thành công!</p>
                <div class="confirm_button">
                    <button onclick="close_change_pwd_success()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup doi mat khau thanh cong -->

    <!-- popup sai mat khau -->
    <div class="popup_invalid_pwd">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Cảnh báo!</p>
                <p class="content">Mật khẩu hiện tại không đúng, vui lòng kiểm tra lại.</p>
                <div class="confirm_button">
                    <button onclick="close_invalid_pwd()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup sai mat khau -->
    <!-- popup danh gia -->
    <div class="popup_rate">
        <div class="popup_bg">
            <div class="popup_content">
                <div class="bg">
                    <img src="/images/popup_rate_bg.png" alt="anh nen">
                </div>
                <div class="content">
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" checked="">
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4">
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3">
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2">
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" value="1">
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <textarea placeholder="Để lại lời nhận xét giúp ứng viên nâng cao thêm chất lượng công việc bạn nha..."></textarea>
                </div>
                <div class="confirm_button">
                    <button class="yes" id="rate">Đánh giá</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup danh gia -->

    <!-- popup danh gia thanh cong -->
    <div class="popup_rate_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn vừa tạo đánh giá chất lượng dịch vụ của người giúp việc tại <span><a>giupviec.vieclam123.vn</a></span></p>
                <div class="confirm_button">
                    <button onclick="close_rate_success()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup danh gia thanh cong -->
    <!-- het popup -->
