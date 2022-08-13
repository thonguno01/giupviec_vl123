    <!-- body-begin -->
    <!-- Popup cmt -->
    <div class="popup-cmt" id="popup_cmt">
        <div class="box-inf">
            <div class="top">
                <p class="title">Nhập thông tin</p>
                <button class="close-popup" onclick="close_popup_cmt()"><img src="/images/evaluate/close-square.svg" alt=""></button>
            </div>
            <form class="inf-cmt">
                <div class="select-box">
                    <input type="radio" id="male" name="sex" value="male">
                    <label for="male">Anh</label>
                    <input type="radio" id="female" name="sex" value="female">
                    <label for="female">Chị</label>
                </div>
                <div class="inf">
                    <input type="text" placeholder="Họ tên (bắt buộc)">
                    <input type="text" placeholder="Email (để nhận phản hồi qua email)">
                    <input type="text" placeholder="Số điện thoại (để nhận phản hồi">
                    <button type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End popup cmt -->
    <!-- popup rate-->
    <div class="popup_rate" id="popup_rate" style="display: none;">
        <div class="block-comment" id="div_cmt_popup">
            <p class="title">Khách hàng chấm điểm, đánh giá, nhận xét</p>
            <div class="rate-area">
                <div class="box01">
                    <div class="block01">
                        <p class="text1">4.0</p>
                        <p class="text2">/5</p>
                    </div>
                    <div class="block02">
                        <div class="line">
                            <img src="/images/evaluate/star-1.png">
                            <p>1 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-2.png">
                            <p>10 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-3.png">
                            <p>12 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-4.png">
                            <p>10 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-5.png">
                            <p>99 lượt đánh giá</p>
                        </div>
                    </div>
                    <div class="block03">
                        <p>Chia sẻ cảm nhận về sản phẩm</p>
                        <button class="close" id="close-popup-rate" style="display: block;" onclick="close_popup_rate()">Đóng lại</button>
                    </div>
                </div>
                <form class="form-rate" id="form-rate-popup">
                    <div class="box01">
                        <p>Chọn đánh giá của bạn</p>
                        <div class="star">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                        </div>
                    </div>
                    <div class="box02">
                        <div class="left">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Nhập đánh giá"></textarea>
                            <div class="box-submit">
                                <button class="add-img">
                  <img src="//images/evaluate/camera.svg" alt="">
                  <p>Gửi ảnh</p>
                </button>
                            </div>
                        </div>
                        <div class="right">
                            <div class="text">
                                <p class="subtitle">Họ và tên</p>
                                <p class="error-name">*</p>
                            </div>
                            <input type="text">
                            <div class="text">
                                <p class="subtitle">Số điện thoại</p>
                                <p class="error-phone">*</p>
                            </div>
                            <input type="text">
                            <div class="text">
                                <p class="subtitle">Email</p>
                                <p class="error-email">*</p>
                            </div>
                            <input type="text">
                            <button>Gửi đánh giá</button>
                        </div>
                    </div>

                </form>
                <div class="show-rate">
                    <p class="name">Đặng Diệp Thảo</p>
                    <div class="star">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                    </div>
                    <p class="content">Sản phẩm rất tốt</p>
                    <p class="time">18/01/2021 08:07</p>
                    <div class="rep">
                        <p class="name">Timviec365.com</p>
                        <p class="content">Dạ cám ơn anh đã ủng hộ maychamcong.timviec365 ạ.</p>
                        <p class="time">18/01/2021 09:07</p>
                    </div>
                </div>
                <div class="show-rate">
                    <p class="name">Đặng Diệp Thảo</p>
                    <div class="star">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                    </div>
                    <p class="time">18/01/2021 08:07</p>
                    <div class="rep">
                        <p class="name">Timviec365.com</p>
                        <p class="content">Dạ cám ơn anh đã ủng hộ maychamcong.timviec365 ạ.</p>
                        <p class="time">18/01/2021 09:07</p>
                    </div>
                </div>
            </div>
            <div class="cmt-area">
                <form class="cmt">
                    <textarea placeholder="Nhập bình luận"></textarea>
                    <div class="box-submit">
                        <button class="add-img">
              <img src="//images/evaluate/camera.svg" alt="">
              <p>Gửi ảnh</p>
            </button>
                        <a href="#">Quy định đăng bình luận</a>
                        <button type="submit" class="send-cmt">Gửi bình luận</button>
                    </div>
                </form>
                <div class="show-cmt">
                    <div class="profile">
                        <img src="/images/evaluate/pro-avt.png" alt="">
                        <p class="name">Đặng Diệp Thảo</p>
                        <p class="time">18/01/2021 08:07</p>
                    </div>
                    <div class="cmt-content">
                        <p class="content">chuột này có chỉnh được độ nhạy của chuột ko ad ?</p>
                        <div class="rep">
                            <img src="/images/evaluate/tv365-pro.png">
                            <div class="text">
                                <p class="name">Timviec365.com</p>
                                <p class="content">Xin chào anh Khánh</p>
                                <p class="content">Rất tiếc chuột không thể chỉnh độ nhạy ạ</p>
                                <p class="content">Thông tin đến anh.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                        <div class="rep">
                            <img src="/images/evaluate/pro-avt.png">
                            <div class="text">
                                <p class="name">Đặng Diệp Thảo</p>
                                <p class="content">Cảm ơn admin đã phản hồi.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="show-cmt">
                    <div class="profile">
                        <img src="/images/evaluate/pro-avt.png" alt="">
                        <p class="name">Đặng Diệp Thảo</p>
                        <p class="time">18/01/2021 08:07</p>
                    </div>
                    <div class="cmt-content">
                        <p class="content">chuột này có chỉnh được độ nhạy của chuột ko ad ?</p>
                        <div class="rep">
                            <img src="/images/evaluate/tv365-pro.png">
                            <div class="text">
                                <p class="name">Timviec365.com</p>
                                <p class="content">Xin chào anh Khánh</p>
                                <p class="content">Rất tiếc chuột không thể chỉnh độ nhạy ạ</p>
                                <p class="content">Thông tin đến anh.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                        <div class="rep">
                            <img src="/images/evaluate/pro-avt.png">
                            <div class="text">
                                <p class="name">Đặng Diệp Thảo</p>
                                <p class="content">Cảm ơn admin đã phản hồi.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end popup rate-->
    <div class="address_bar">
        <a href="/"><img class="img1" src="/images/evaluate/home_icon.svg"></a>
        <img class="img2" src="/images/evaluate/arrow_right.svg" alt="">
        <a class="link_grey" href="danh-sach-san-pham">Máy chấm công</a>
        <img class="img2" src="/images/evaluate/arrow_right.svg" alt="">
        <a class="link_blue">Máy chấm công vân tay Ronald Jack</a>
    </div>
    <div class="box-top">
        <div class="block-product">
            <p class="product-name">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</p>
            <div class="block-img">
                <div class="img-show slick-list">

                    <div class="img-show slider-for">
                        <div><img src="/images/evaluate/thumb1.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb2.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb3.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb1.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb2.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb3.png" alt=""></div>
                    </div>

                </div>
                <div class="img-thumb slick-list">

                    <div class="img-thumb-slider slider-nav">
                        <div><img src="/images/evaluate/thumb1.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb2.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb3.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb1.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb2.png" alt=""></div>
                        <div><img src="/images/evaluate/thumb3.png" alt=""></div>
                    </div>

                </div>
            </div>
            <div class="block-infor">
                <div class="info">
                    <div class="box_review">
                        <div class="star">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                        </div>
                        <p>5 đánh giá</p>
                        <img src="/images/evaluate/Line.svg">
                        <p>15 bình luận</p>
                    </div>
                    <div class="pro-para">
                        <p class="para-head">Thông số sản phẩm</p>
                        <div class="para-content">
                            <p>- Tốc độ xử lý nhanh</p>
                            <p>- 1s/1lần chấm công.</p>
                            <p>- Quản lý 4000 dấu vân tay & 10,000 thẻ cảm ứng</p>
                            <p>- Một người có thể đăng ký từ 1 đến 10 dấu vân tay</p>
                            <p>- Dung lượng nhớ 100.000 IN/OUT.</p>
                        </div>
                    </div>
                </div>
                <div class="box-price">
                    <div class="box01">
                        <div class="status">
                            <img src="/images/evaluate/green-dot.svg">
                            <p>Còn Hàng</p>
                        </div>
                        <div class="old-price">
                            <p>3.729.000 đ</p>
                        </div>
                    </div>
                    <div class="box02">
                        <div class="amount">
                            <p>Số lượng:</p>
                            <button class="btn_sub" onclick="minus_qty('amount')"><img src="/images/evaluate/sub-button.svg" alt=""></button>
                            <input type="number" id="amount" value="01">
                            <button class="btn_add" onclick="add_qty('amount')"><img src="/images/evaluate/add-button.svg" alt=""></button>
                        </div>
                        <div class="new-price">
                            <p>2.249.000 đ</p>
                        </div>
                    </div>
                </div>
                <div class="box-order">
                    <button class="add-cart">
            <img src="/images/evaluate/add-cart.svg">
            <p>Thêm vào giỏ</p>
          </button>
                    <button class="btn-order">
            <img src="/images/evaluate/cross.svg">
            <p>Đặt ngay</p>
          </button>
                </div>
            </div>
        </div>

    </div>
    <div class="sellect-box">
        <button id="btn_show_rate" class="select" onclick="show_rate()">Đánh giá sản phẩm</button>
        <button id="btn_show_spec" class="unselect" onclick="show_spec()">Thông số kĩ thuật</button>
        <button id="btn_show_poli" class="unselect" onclick="show_poli()">Chính sách</button>
        <button id="btn_show_cmt" class="unselect" onclick="show_cmt()">Bình luận</button>
    </div>
    <div class="block-policy" id="div_poli">
        <div class="deliver">
            <img src="/images/evaluate/deliver.svg">
            <p>Sản phẩm được miễn phí giao hàng</p>
        </div>
        <div class="policy-box">
            <div class="title">Chính sách bán hàng</div>
            <div class="content">
                <img src="/images/evaluate/transit.svg">
                <p>Miễn phí giao hàng cho đơn hàng từ 800k</p>
            </div>
            <div class="content">
                <img src="/images/evaluate/shield-tick.svg">
                <p>Cam kết hàng chính hãng 100%</p>
            </div>
            <div class="content">
                <img src="/images/evaluate/3d-rotate.svg">
                <p>Đổi trả trong vòng 10 ngày</p>
            </div>
            <div class="title"> Yên tâm mua hàng</div>
            <div class="content">
                <img src="/images/evaluate/tag.svg">
                <p>Trả góp lãi suất 0% toàn bộ giỏ hàng
                </p>
            </div>
            <div class="content">
                <img src="/images/evaluate/3d-cube-scan.svg">
                <p>Trả bảo hành tận nơi sử dụng
                </p>
            </div>
            <div class="content">
                <img src="/images/evaluate/broom.svg">
                <p>Bảo hành tận nơi cho doanh nghiệp</p>
            </div>
        </div>
    </div>
    <div class="block-left">
        <div class="block-detail" id="div_rate">
            <div class="title">
                <img src="/images/evaluate/link.svg">
                <a href="#">
                    <p>Đánh giá máy chấm công vân tay Ronald Jack 5000 AID</p>
                </a>
            </div>
            <div class="content">
                <p class="name">Tên sản phẩm</p>
                <p>Giới thiệu...</p>
            </div>
            <button>
        <p>Xem thêm</p>
        <img src="/images/evaluate/arrow-bottom.svg">
      </button>
        </div>
        <div class="block-comment" id="div_cmt">
            <p class="title">Khách hàng chấm điểm, đánh giá, nhận xét</p>
            <div class="rate-area">
                <div class="box01">
                    <div class="block01">
                        <p class="text1">4.0</p>
                        <p class="text2">/5</p>
                    </div>
                    <div class="block02">
                        <div class="line">
                            <img src="/images/evaluate/star-1.png">
                            <p>1 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-2.png">
                            <p>10 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-3.png">
                            <p>12 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-4.png">
                            <p>10 lượt đánh giá</p>
                        </div>
                        <div class="line">
                            <img src="/images/evaluate/star-5.png">
                            <p>99 lượt đánh giá</p>
                        </div>
                    </div>
                    <div class="block03">
                        <p>Chia sẻ cảm nhận về sản phẩm</p>
                        <button class="close" id="close-rate" onclick="close_rate()">Đóng lại</button>
                        <button class="open" id="open-rate" style="display: none;" onclick="open_rate()">Gửi đánh giá của bạn</button>
                        <button class="open" id="open-popup-rate" style="display: none;" onclick="open_popup_rate()">Gửi đánh giá của bạn</button>
                    </div>
                </div>
                <form class="form-rate" id="form-rate">
                    <div class="box01">
                        <p>Chọn đánh giá của bạn</p>
                        <div class="star">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                            <img src="/images/evaluate/star-white.svg" alt="">
                        </div>
                    </div>
                    <div class="box02">
                        <div class="left">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Nhập đánh giá"></textarea>
                            <div class="box-submit">
                                <button class="add-img">
                  <img src="//images/evaluate/camera.svg" alt="">
                  <p>Gửi ảnh</p>
                </button>
                            </div>
                        </div>
                        <div class="right">
                            <div class="text">
                                <p class="subtitle">Họ và tên</p>
                                <p class="error-name">*</p>
                            </div>
                            <input type="text">
                            <div class="text">
                                <p class="subtitle">Số điện thoại</p>
                                <p class="error-phone">*</p>
                            </div>
                            <input type="text">
                            <div class="text">
                                <p class="subtitle">Email</p>
                                <p class="error-email">*</p>
                            </div>
                            <input type="text">
                            <button>Gửi đánh giá</button>
                        </div>
                    </div>

                </form>
                <div class="show-rate">
                    <p class="name">Đặng Diệp Thảo</p>
                    <div class="star">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                    </div>
                    <p class="content">Sản phẩm rất tốt</p>
                    <p class="time">18/01/2021 08:07</p>
                    <div class="rep">
                        <p class="name">Timviec365.com</p>
                        <p class="content">Dạ cám ơn anh đã ủng hộ maychamcong.timviec365 ạ.</p>
                        <p class="time">18/01/2021 09:07</p>
                    </div>
                </div>
                <div class="show-rate">
                    <p class="name">Đặng Diệp Thảo</p>
                    <div class="star">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                        <img src="/images/evaluate/star-full.svg" alt="">
                    </div>
                    <p class="time">18/01/2021 08:07</p>
                    <div class="rep">
                        <p class="name">Timviec365.com</p>
                        <p class="content">Dạ cám ơn anh đã ủng hộ maychamcong.timviec365 ạ.</p>
                        <p class="time">18/01/2021 09:07</p>
                    </div>
                </div>
            </div>
            <div class="cmt-area">
                <form class="cmt">
                    <textarea placeholder="Nhập bình luận"></textarea>
                    <div class="box-submit">
                        <button class="add-img">
              <img src="//images/evaluate/camera.svg" alt="">
              <p>Gửi ảnh</p>
            </button>
                        <a href="#">Quy định đăng bình luận</a>
                        <button type="button" class="send-cmt" onclick="open_popup_cmt()">Gửi bình luận</button>
                    </div>
                </form>
                <div class="show-cmt">
                    <div class="profile">
                        <img src="/images/evaluate/pro-avt.png" alt="">
                        <p class="name">Đặng Diệp Thảo</p>
                        <p class="time">18/01/2021 08:07</p>
                    </div>
                    <div class="cmt-content">
                        <p class="content">chuột này có chỉnh được độ nhạy của chuột ko ad ?</p>
                        <div class="rep">
                            <img src="/images/evaluate/tv365-pro.png">
                            <div class="text">
                                <p class="name">Timviec365.com</p>
                                <p class="content">Xin chào anh Khánh</p>
                                <p class="content">Rất tiếc chuột không thể chỉnh độ nhạy ạ</p>
                                <p class="content">Thông tin đến anh.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                        <div class="rep">
                            <img src="/images/evaluate/pro-avt.png">
                            <div class="text">
                                <p class="name">Đặng Diệp Thảo</p>
                                <p class="content">Cảm ơn admin đã phản hồi.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="show-cmt">
                    <div class="profile">
                        <img src="/images/evaluate/pro-avt.png" alt="">
                        <p class="name">Đặng Diệp Thảo</p>
                        <p class="time">18/01/2021 08:07</p>
                    </div>
                    <div class="cmt-content">
                        <p class="content">chuột này có chỉnh được độ nhạy của chuột ko ad ?</p>
                        <div class="rep">
                            <img src="/images/evaluate/tv365-pro.png">
                            <div class="text">
                                <p class="name">Timviec365.com</p>
                                <p class="content">Xin chào anh Khánh</p>
                                <p class="content">Rất tiếc chuột không thể chỉnh độ nhạy ạ</p>
                                <p class="content">Thông tin đến anh.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                        <div class="rep">
                            <img src="/images/evaluate/pro-avt.png">
                            <div class="text">
                                <p class="name">Đặng Diệp Thảo</p>
                                <p class="content">Cảm ơn admin đã phản hồi.</p>
                                <p class="time">18/01/2021 09:07</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-right">
        <div class="block-spec" id="div_spec">
            <div class="title">
                <img src="/images/evaluate/spec.svg">
                <p>Thông số kỹ thuật</p>
            </div>
            <div class="content">
                <div class="head">
                    <p>Thông tin cơ bản</p>
                </div>
                <div class="line">
                    <p class="subtitle">
                        Model
                    </p>
                    <p class="text">
                        DG600ID
                    </p>
                </div>
            </div>
            <button>Xem thông tin chi tiết</button>
        </div>
        <div class="wr_banner7">
            <div class="wr_bn7_left">
                <div class="title-banner7">
                    <div class="text">
                        <span class="title_1">Punlock</span>
                        <span class="title_2">365</span>
                    </div>
                    <p class="text-1">App chấm công bằng công nghệ mới nhất hiện nay
                        </>
                        <p class="text-2">Chúng tôi mang đến dịch vụ tuyệt vời nhất cho các công ty quản lí và người lao động</p>
                        <div class="button-bn7">
                            <button class="button-7">
              Xem chi tiết<img src="/images/left.png" alt="">
            </button>
                        </div>
                </div>
            </div>
            <div class="wr_bn7_right">
                <img src="/images/logo.png" alt="">
            </div>
        </div>
    </div>
    <div class="wr_baner_bottom">
        <section class="customer">
            <div class="container">
                <div class="boxed">
                    <div class="heading">Sản phẩm giảm giá</div>
                </div>
                <div class="customer-list">
                <div class="customer-item">
              <div class="customer-top">
                  <div class="customer-info">
                    <a class="customer-avatar" href="/views/evaluate.php">
                      <img srcset="/images/sp-1.png" alt="">
                    </a>
                    <div class="customer-rating">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <span>(4.5)</span>
                      <span class="text-small customer-address">MSP: CCRO037</span>
                    </div>
                    <div class="customer-content">
                      <a class="heading-small customer-name" href="/views/evaluate.php">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</a>
                    </div>
                    <div class="customer-prices">
                      <a class="prices" href="/views/evaluate.php">2.249.000 đ</a>
                      <a href="/views/evaluate.php">3.729.000 đ</a>
                      <button><img src="/images/shop-1.svg" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customer-item">
              <div class="customer-top">
                  <div class="customer-info">
                    <a class="customer-avatar" href="/views/evaluate.php">
                      <img srcset="/images/sp-1.png" alt="">
                    </a>
                    <div class="customer-rating">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <span>(4.5)</span>
                      <span class="text-small customer-address">MSP: CCRO037</span>
                    </div>
                    <div class="customer-content">
                      <a class="heading-small customer-name" href="/views/evaluate.php">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</a>
                    </div>
                    <div class="customer-prices">
                      <a class="prices" href="/views/evaluate.php">2.249.000 đ</a>
                      <a href="/views/evaluate.php">3.729.000 đ</a>
                      <button><img src="/images/shop-1.svg" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customer-item">
              <div class="customer-top">
                  <div class="customer-info">
                    <a class="customer-avatar" href="/views/evaluate.php">
                      <img srcset="/images/sp-1.png" alt="">
                    </a>
                    <div class="customer-rating">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <span>(4.5)</span>
                      <span class="text-small customer-address">MSP: CCRO037</span>
                    </div>
                    <div class="customer-content">
                      <a class="heading-small customer-name" href="/views/evaluate.php">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</a>
                    </div>
                    <div class="customer-prices">
                      <a class="prices" href="/views/evaluate.php">2.249.000 đ</a>
                      <a href="/views/evaluate.php">3.729.000 đ</a>
                      <button><img src="/images/shop-1.svg" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customer-item">
              <div class="customer-top">
                  <div class="customer-info">
                    <a class="customer-avatar" href="/views/evaluate.php">
                      <img srcset="/images/sp-1.png" alt="">
                    </a>
                    <div class="customer-rating">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <span>(4.5)</span>
                      <span class="text-small customer-address">MSP: CCRO037</span>
                    </div>
                    <div class="customer-content">
                      <a class="heading-small customer-name" href="/views/evaluate.php">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</a>
                    </div>
                    <div class="customer-prices">
                      <a class="prices" href="/views/evaluate.php">2.249.000 đ</a>
                      <a href="/views/evaluate.php">3.729.000 đ</a>
                      <button><img src="/images/shop-1.svg" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customer-item">
              <div class="customer-top">
                  <div class="customer-info">
                    <a class="customer-avatar" href="/views/evaluate.php">
                      <img srcset="/images/sp-1.png" alt="">
                    </a>
                    <div class="customer-rating">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <img src="/images/icon-star.png" alt="">
                      <span>(4.5)</span>
                      <span class="text-small customer-address">MSP: CCRO037</span>
                    </div>
                    <div class="customer-content">
                      <a class="heading-small customer-name" href="/views/evaluate.php">MÁY CHẤM CÔNG VÂN TAY RONALD JACK 5000 AID</a>
                    </div>
                    <div class="customer-prices">
                      <a class="prices" href="/views/evaluate.php">2.249.000 đ</a>
                      <a href="/views/evaluate.php">3.729.000 đ</a>
                      <button><img src="/images/shop-1.svg" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <!-- body-end -->