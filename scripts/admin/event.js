$("#sal").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});

$("#sal_from").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});
$("#sal_to").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});