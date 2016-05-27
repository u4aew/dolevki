$(window).on('load resize', windowSize);
function windowSize() {
    if ($(window).width() <= '1280') {
        $("#nav_js").removeClass("navigation");
        $(".main").css('margin-left',0);

    } else {
        $("#nav_js").addClass("navigation");
        $(".main").css('margin-left',300);
    }
}
