// cart-details
function remove() {
    this.parentNode.parentNode.removeChild(this.parentNode);
  }
  
  var lis = document.querySelectorAll('product');
  var button = document.querySelectorAll('<img src="/images/remove.svg" alt="">');
  
  for (var i = 0, len = lis.length; i < len; i++) {
    button[i].addEventListener('click', remove, false);
  }
  //hiden
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
  document.getElementById('close_1').onclick = function(e) {
    if (this.checked) {
        document.getElementById('form-rate-1').style.display = "none"
    } else {
        document.getElementById('form-rate-1').style.display = "block"
    }
}
  $(".customer-list").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 376,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });