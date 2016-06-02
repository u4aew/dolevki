$(document).ready(function () {
    if ($(window).width() < '1280') {

        $(".description-building").css('top', -150);
    }
    else {
    }

    $(".select-room-click").click(
        function () {
            $(this).toggleClass("select-room-click-cheked");
        }
    )

})

$(window).scroll(function () {

    if (window.scrollY > 160) {
        $(".navigation").addClass("navigation-fixed").css('top', -160);
    } else {
        $(".navigation").removeClass("navigation-fixed").css('top', 0);
    }
    ;
})
