jQuery(document).ready(function ($) {
    // Клик по кнопке-гамбургеру открывает меню, повторный клик закрывает
    $('.pushmenu').click(function () {
        $('.pushmenu').toggleClass("open");
        $('.sidebar').toggleClass("show");
        $('.hidden-overley').toggleClass("show");
        $('body').toggleClass("sidebar-opened")
    });
    // Когда панель открыта, клик по облсти вне панели закрывает ее
    $('.hidden-overley').click(function () {
        $(this).toggleClass("show");
        $('.sidebar').toggleClass("show");
        $('.pushmenu').toggleClass("open");
        $('body').toggleClass("sidebar-opened")
    });
    // меняем активность пункта меню по клику (НЕОБЯЗАТЕЛЬНО)
    $('.sidebar ul li').click(function () {
        $(this).addClass("current-menu-item").siblings().removeClass("current-menu-item");
    });
    // Для анимации поворота каретки
    $('.menu-parent-item a:first-child').click(function () {
        $(this).siblings().toggleClass("show");
        $(this).find("i").toggleClass("rotate");
    });
});