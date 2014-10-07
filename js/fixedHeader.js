function changePos() {
    var header = document.getElementById("header");
    if (window.pageYOffset > 300) {
        header.style.position = "fixed";
        header.style.top = "0";
    } else {
        header.style.position = "";
        header.style.top = "";
    }
 }
window.addEventListener('scroll', changePos, false);