function show_rate() {
    document.getElementById('div_rate').style.display = "block";
    document.getElementById('div_spec').style.display = "none";
    document.getElementById('div_poli').style.display = "none";
    document.getElementById('div_cmt').style.display = "none";
    document.getElementById('btn_show_rate').className = "select";
    document.getElementById('btn_show_spec').className = "unselect";
    document.getElementById('btn_show_poli').className = "unselect";
    document.getElementById('btn_show_cmt').className = "unselect";
}

function show_spec() {
    document.getElementById('div_rate').style.display = "none";
    document.getElementById('div_spec').style.display = "block";
    document.getElementById('div_poli').style.display = "none";
    document.getElementById('div_cmt').style.display = "none";
    document.getElementById('btn_show_rate').className = "unselect";
    document.getElementById('btn_show_spec').className = "select";
    document.getElementById('btn_show_poli').className = "unselect";
    document.getElementById('btn_show_cmt').className = "unselect";
}

function show_poli() {
    document.getElementById('div_rate').style.display = "none";
    document.getElementById('div_spec').style.display = "none";
    document.getElementById('div_poli').style.display = "block";
    document.getElementById('div_cmt').style.display = "none";
    document.getElementById('btn_show_rate').className = "unselect";
    document.getElementById('btn_show_spec').className = "unselect";
    document.getElementById('btn_show_poli').className = "select";
    document.getElementById('btn_show_cmt').className = "unselect";
}

function show_cmt() {
    document.getElementById('div_rate').style.display = "none";
    document.getElementById('div_spec').style.display = "none";
    document.getElementById('div_poli').style.display = "none";
    document.getElementById('div_cmt').style.display = "block";
    document.getElementById('btn_show_rate').className = "unselect";
    document.getElementById('btn_show_spec').className = "unselect";
    document.getElementById('btn_show_poli').className = "unselect";
    document.getElementById('btn_show_cmt').className = "select";
}

function open_rate() {
    document.getElementById('open-rate').style.display = "none";
    document.getElementById('close-rate').style.display = "block";
    document.getElementById('form-rate').style.display = "block";
}

function close_rate() {
    document.getElementById('close-rate').style.display = "none";
    document.getElementById('open-rate').style.display = "block";
    document.getElementById('form-rate').style.display = "none";
}

function open_popup_rate() {
    document.getElementById('popup_rate').style.display = "block";
    document.getElementById('div_cmt_popup').style.display = "block";
}

function close_popup_rate() {
    document.getElementById('popup_rate').style.display = "none";
}

function close_popup_cmt() {
    document.getElementById('popup_cmt').style.display = "none";
}

function open_popup_cmt() {
    document.getElementById('popup_cmt').style.display = "block";
}

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav',
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    arrows: true,
    dots: false,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
    centerMode: false,
    focusOnSelect: true
});

function add_qty(qty) {
    let num;
    num = document.getElementById(qty).value;
    num++;
    document.getElementById(qty).value = num;
}

function minus_qty(qty) {
    if (document.getElementById(qty).value > 0) {
        let num;
        num = document.getElementById(qty).value;
        num--;
        document.getElementById(qty).value = num;
    }
}