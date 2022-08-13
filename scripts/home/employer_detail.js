$(".item_parent").hover(function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/add_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money_trang.svg " alt="Lương ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp_trang.svg " alt="kinh nghiệm">`;
    this.querySelector('.img_job').innerHTML = `<img src="/images/recruit_detail/job_white.svg " alt="Công việc ">`;
    this.querySelector('.img_age').innerHTML = `<img src="/images/recruit_detail/cake_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_star').innerHTML = `<img src="/images/recruit_detail/star_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.star_prominent').innerHTML = `  <img src="/images/recruit_detail/star_white.svg " alt="yêu thích ">`;
}, function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/address.svg" alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money.svg " alt="Địa điểm ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp.svg " alt="Địa điểm ">`;
    this.querySelector('.star_prominent').innerHTML = ` <img src="/images/job_list/starPNG.svg" alt="LogoVieclam123">`;
    this.querySelector('.img_job').innerHTML = `<img src="/images/job_list/job.svg" alt="Công việc">`;
    this.querySelector('.img_age').innerHTML = `<img src="/images/job_list/age.svg" alt="Độ tuổi">`;
    this.querySelector('.img_star').innerHTML = `<img src="/images/job_list/start.svg" alt="Địa chỉ làm việc">`;
});