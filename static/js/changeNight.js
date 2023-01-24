// 夜间模式
const ele = document.getElementsByTagName('html')[0];
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
} 
function switchNightMode() {
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || "0";
    if (night == "0") {
        ele.setAttribute('data-color-mode','night');
        setCookie('night','1');
    } else {
        ele.setAttribute('data-color-mode','light');
        setCookie('night','0');
    }
} (function() {
    if (document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === "") {
        if (judge) {
            ele.setAttribute('data-color-mode','night');
            setCookie('night','1');
        } else {
            ele.setAttribute('data-color-mode','light');
            setCookie('night','0');
        }
    } else {
        var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || "0";
        if (night == "0") {
            ele.setAttribute('data-color-mode','light');
        } else {
            if (night == "1") {
                ele.setAttribute('data-color-mode','night');
            }
        }
    }
})();