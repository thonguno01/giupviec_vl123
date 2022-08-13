document.getElementById('btn_close').onclick = function(e) {
    document.getElementById('cart_popup').style.display = "none";
}

document.getElementById('btn_cart').onclick = function(e) {
    document.getElementById('cart_popup').style.display = "block";
}

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