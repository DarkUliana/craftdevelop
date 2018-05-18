function dropNavToggle() {
    $("#nav-dropdown").toggleClass("show"), $(this).children(".carret").toggleClass("carret-toggle");
}
function dropLangToggle() {
    $("#lang-dropdown").toggleClass("show"), $(this).children(".carret").toggleClass("carret-toggle");
}
window.onclick=function(e) {
    if(!e.target.matches(".btn--nav-dropdown")) {
    $("#nav-dropdown").hasClass("show")&&$("#btn-nav-drop").children(".carret").toggleClass("carret-toggle");
    var t, o=document.getElementsByClassName("dropdown-content");
    for(t=0;
    t<o.length;
    t++) {
    var n=o[t];
    n.classList.contains("show")&&n.classList.remove("show");
}
}
if(!e.target.matches(".btn--lang-dropdown")) {
    $("#lang-dropdown").hasClass("show")&&$("#btn--lang").children(".carret").toggleClass("carret-toggle");
    var t, o=document.getElementsByClassName("select-content");
    for(t=0;
    t<o.length;
    t++) {
    var n=o[t];
    n.classList.contains("show")&&n.classList.remove("show");
}
}
}
;
    var toogle_btn=$("#toogle-btn"), menu=$(".main-nav"), modal_open=$(".btn--open-modal"), modal_close=$(".btn--modal-close, .modal-overlay"), breadcrumbs_item=$(".breadcrumbs__list-item--active").children().html();
    void 0!=breadcrumbs_item&&(breadcrumbs_item=$(".breadcrumbs__list-item--active").children().html(breadcrumbs_item.substring(0, 19)+"...")), toogle_btn.on("click", function() {
    menu.slideToggle();
}
), $(window).resize(function() {
    $(window).width()>767&&menu.is(":hidden")&&menu.removeAttr("style");
}
);




var textArr = $(".img-descr__text");


for (var i=0; i < textArr.length; i++) {
	textArr[i].innerHTML = textArr[i].innerHTML.split(".")[0];
	textArr[i].innerHTML = textArr[i].innerHTML.split("?")[0];
	textArr[i].innerHTML = textArr[i].innerHTML.split("!")[0];
}
	

	

   


