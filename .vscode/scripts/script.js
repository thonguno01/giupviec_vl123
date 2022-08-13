const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider-prices .progress");
let priceGap = 1000;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
//pagination begin
// selecting required element
const element = document.querySelector(".pagination ul");
let totalPages = 20;
let page = 3;

//calling function with passing parameters and adding inside element which is ul tag
element.innerHTML = createPagination(totalPages, page);
function createPagination(totalPages, page){
  let liTag = '';
  let active;
  let beforePage = page - 1;
  let afterPage = page + 1;
  if(page > 1){ //show the next button if the page value is greater than 1
    liTag += `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i><img src="/images/prev.svg"/></span></li>`;
  }

  if(page > 2){ //if page value is less than 2 then add 1 after the previous button
    liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;
    if(page > 3){ //if page value is greater than 3 then add this (...) after the first li or page
      liTag += `<li class="dots"><span>...</span></li>`;
    }
  }

  // how many pages or li show before the current li
  if (page == totalPages) {
    beforePage = beforePage - 2;
  } else if (page == totalPages - 1) {
    beforePage = beforePage - 1;
  }
  // how many pages or li show after the current li
  if (page == 1) {
    afterPage = afterPage + 2;
  } else if (page == 2) {
    afterPage  = afterPage + 1;
  }

  for (var plength = beforePage; plength <= afterPage; plength++) {
    if (plength > totalPages) { //if plength is greater than totalPage length then continue
      continue;
    }
    if (plength == 0) { //if plength is 0 than add +1 in plength value
      plength = plength + 1;
    }
    if(page == plength){ //if page is equal to plength than assign active string in the active variable
      active = "active";
    }else{ //else leave empty to the active variable
      active = "";
    }
    liTag += `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;
  }

  if(page < totalPages - 1){ //if page value is less than totalPage value by -1 then show the last li or page
    if(page < totalPages - 2){ //if page value is less than totalPage value by -2 then add this (...) before the last li or page
      liTag += `<li class="dots"><span>...</span></li>`;
    }
    liTag += `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;
  }

  if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
    liTag += `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span><img src="/images/next.svg"/><i class="fas fa-angle-right"></i></span></li>`;
  }
  element.innerHTML = liTag; //add li tag inside ul tag
  return liTag; //reurn the li tag
}
//trademark-list
$(".trademark-list").slick({
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  dots: false,
  arrows: true,
  prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
  nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
      }
    },
    {
      breakpoint: 376,
      settings: {
        slidesToShow: 3,
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
function close_1() {
  var x = document.getElementById("form-1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function close_2() {
  var x = document.getElementById("form-2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function close_3() {
  var x = document.getElementById("form-3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function close_4() {
  var x = document.getElementById("form-4");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function show_new() {
  document.getElementById('div_new').style.display = "block";
  document.getElementById('div_sell').style.display = "none";
  document.getElementById('div_hotsell').style.display = "none";
  document.getElementById('div_hot').style.display = "none";
  document.getElementById('div_search').style.display = "none";
  document.getElementById('btn_show_new').className = "select";
  document.getElementById('btn_show_sell').className = "unselect";
  document.getElementById('btn_show_hotsell').className = "unselect";
  document.getElementById('btn_show_hot').className = "unselect";
}
function show_sell() {
  document.getElementById('div_new').style.display = "none";
  document.getElementById('div_sell').style.display = "block";
  document.getElementById('div_hotsell').style.display = "none";
  document.getElementById('div_hot').style.display = "none";
  document.getElementById('div_search').style.display = "none";
  document.getElementById('btn_show_new').className = "unselect";
  document.getElementById('btn_show_sell').className = "select";
  document.getElementById('btn_show_hotsell').className = "unselect";
  document.getElementById('btn_show_hot').className = "unselect";
}
function show_hotsell() {
  document.getElementById('div_new').style.display = "none";
  document.getElementById('div_sell').style.display = "none";
  document.getElementById('div_hotsell').style.display = "block";
  document.getElementById('div_hot').style.display = "none";
  document.getElementById('div_search').style.display = "none";
  document.getElementById('btn_show_new').className = "unselect";
  document.getElementById('btn_show_sell').className = "unselect";
  document.getElementById('btn_show_hotsell').className = "select";
  document.getElementById('btn_show_hot').className = "unselect";
}
function show_hot() {
  document.getElementById('div_new').style.display = "none";
  document.getElementById('div_sell').style.display = "none";
  document.getElementById('div_hotsell').style.display = "none";
  document.getElementById('div_hot').style.display = "block";
  document.getElementById('div_search').style.display = "none";
  document.getElementById('btn_show_new').className = "unselect";
  document.getElementById('btn_show_sell').className = "unselect";
  document.getElementById('btn_show_hotsell').className = "unselect";
  document.getElementById('btn_show_hot').className = "select";
}