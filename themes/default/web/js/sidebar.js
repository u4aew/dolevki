$(document).ready(function () {
    var onChange = function()
    {
        $(this).val($(this).val().replace(/[^\d]/g, "").split("").reverse().join("").replace(/\d{3}(?!$|(?:\s$))/g, "$& ").split("").reverse().join(""));
    }

    $(".js-cost-textbox").change(onChange).change();
    $(".js-cost-textbox").keyup(onChange);
    if ($(window).width() < '768') {

        $(".description-building").css('top', -180);
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

    var scrollPos = window.scrollY + document.documentElement.clientHeight;
    if (scrollPos > 1000) {
        $(".navigation").addClass("navigation-fixed").css('bottom', 0);
    } else {
        $(".navigation").removeClass("navigation-fixed").css('bottom', "");
    }
}).scroll();
