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
    $('.sumoSelect').each(function()
    {
        $(this).SumoSelect({
            placeholder: $(this).data("placeholder"),
        });
    });
    $("#status")
        .change(function(){
            var flag = false;
            flag = flag || $("#inProgress").is(':selected');
            var totalChecked = 0;
            $(this).find("option").each(function()
            {
                if ($(this).is(':selected'))
                {
                    totalChecked++;
                    return;
                }
            });
            flag = flag || totalChecked == 0;
            if (flag)
            {
                $("#readyTime__container").slideDown();
            } else
            {
                $("#readyTime__container").slideUp();
            }
        })
        .change();

})

$(window).scroll(function () {

    if (window.scrollY > 160) {
        $(".navigation").addClass("navigation-fixed").css('top', -160);
    } else {
        $(".navigation").removeClass("navigation-fixed").css('top', 0);
    }
    ;
})
