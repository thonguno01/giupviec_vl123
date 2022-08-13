document.getElementById('hide').onclick = function(e) {
    if (this.checked) {
        document.getElementById('input-hide').style.display = "none"
    } else {
        document.getElementById('input-hide').style.display = "block"
    }
}