$(window).on('load resize', windowSize);
function windowSize() {
    if ($(window).width() <= '900') {
        $("#nav_js").removeClass("navigation");
        $(".main").css('margin-left', 0);

    } else {
        $("#nav_js").addClass("navigation");
        $(".main").css();
    }
}

$(document).on('click','.pagination a',
    function(){
        $(window).scrollTop(0)
    }
);

$(document).ready(
    function () {
        setTimeout("$('.js-box-company').fadeIn();", 500);
        setTimeout("$('.js-box-Motivation').fadeIn();", 700);
        setTimeout("$('.js-box-Motivation__one').fadeIn();", 900);
        setTimeout("$('.js-box-Motivation__two').fadeIn();", 1100);
        setTimeout("$('.js-box-Motivation__three').fadeIn();", 1300);
        setTimeout("$('.js-box-work').fadeIn();", 1500);
        setTimeout("$('.js-box-work__one').fadeIn();", 1700);
        setTimeout("$('.js-box-contacts-company').fadeIn();", 1900);
        setTimeout("$('.js-box-contacts-company__one').fadeIn();", 2100);
        setTimeout("$('.js-box-contacts-company__map').fadeIn();", 2400);
    }
)
