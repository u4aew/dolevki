$(document).ready(function () {

    $(".js-cost-textbox").keyup(function()
    {
        $(this).val($(this).val().replace(/[^\d]/g, "").split("").reverse().join("").replace(/\d{3}(?!$|(?:\s$))/g, "$& ").split("").reverse().join(""));

        var value1 = $("input#amount_two").val().replace(new RegExp('[ ]', 'g'),"");
        var value2 = $("input#amount_1_two").val().replace(new RegExp('[ ]', 'g'),"");
        $("#slider-range_two").slider("values", 0, value1);
        $("#slider-range_two").slider("values", 1, value2);
    });

    $(".js-cost-textbox").focusout(function()
    {
        var value1 = parseInt($("input#amount_two").val().replace(new RegExp('[ ]', 'g'),""));
        var value2 = parseInt($("input#amount_1_two").val().replace(new RegExp('[ ]', 'g'),""));
        if (value1 > value2)
        {
            $("input#amount_two").val(value2).keyup();
            $("input#amount_1_two").val(value1).keyup();
        }
    });
    $("input#amount_two").keyup();
    $("input#amount_1_two").keyup();

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

    if (window.scrollY > 370) {
        $(".navigation").addClass("navigation-fixed").css('top', -370);
    } else {
        $(".navigation").removeClass("navigation-fixed").css('top', 0);
    }
    ;
})
