$(function () {
    $("#slider-range").slider({
        // orientation: "vertical",
        // step: 10,
        range: true
        , min: getParams().minimalAvailableSize
        , max: getParams().maximalAvailableSize
        , values: [getParams().currentMinSize, getParams().currentMaxSize]
        , slide: function (event, ui) {
            $("#amount").val(ui.values[0]);
            $("#amount_1").val(ui.values[1]);
        }
    });
    $("#amount").val($("#slider-range").slider("values", 0));
    $("#amount_1").val($("#slider-range").slider("values", 1));

    $("input#amount").change(function () {
        var value1 = $("input#amount").val();
        var value2 = $("input#amount_1").val();
        if (parseInt(value1) > parseInt(value2)) {
            value1 = value2;
            $("input#amount").val(value1);
        }
        $("#slider-range").slider("values", 0, value1);
    });


    $("input#amount_1").change(function () {
        var value1 = $("input#amount").val();
        var value2 = $("input#amount_1").val();

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            $("input#amount_1").val(value2);
        }
        $("#slider-range").slider("values", 1, value2);
    });

    jQuery('#amount, #amount_1').keypress(function (event) {
        var key, keyChar;
        if (!event) var event = window.event;

        if (event.keyCode) key = event.keyCode;
        else if (event.which) key = event.which;

        if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39) return true;
        keyChar = String.fromCharCode(key);

        if (!/\d/.test(keyChar)) return false;

    });

});
$(function () {
    $("#slider-range_two").slider({
        // orientation: "vertical",
        // step: 10,
        range: true
        , min: getParams().minimalAvailableCost
        , max: getParams().maximalAvailableCost
        , values: [getParams().currentMinCost, getParams().currentMaxCost]
        , slide: function (event, ui) {
            $("#amount_two").val(ui.values[0]).change();
            $("#amount_1_two").val(ui.values[1]).change();
        }
    });
    $("#amount_two").val($("#slider-range_two").slider("values", 0));
    $("#amount_1_two").val($("#slider-range_two").slider("values", 1));

    $("input#amount_two").keyup(function () {
        var value1 = $("input#amount_two").val().replace(new RegExp('[ ]', 'g'),"");
        var value2 = $("input#amount_1_two").val().replace(new RegExp('[ ]', 'g'),"");
        if (parseInt(value1) > parseInt(value2)) {
            value1 = value2;
            $("input#amount_two").val(value1);
        }
        $("#slider-range_two").slider("values", 0, value1);
    });


    $("input#amount_1_two").keyup(function () {
        var value1 = $("input#amount_two").val().replace(new RegExp('[ ]', 'g'),"");
        var value2 = $("input#amount_1_two").val().replace(new RegExp('[ ]', 'g'),"");

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            $("input#amount_1_two").val(value2);
        }
        $("#slider-range_two").slider("values", 1, value2);
    });

    // ���������� ����� � ����
    jQuery('#amount_two, #amount_1_two').keypress(function (event) {
        var key, keyChar;
        if (!event) var event = window.event;

        if (event.keyCode) key = event.keyCode;
        else if (event.which) key = event.which;

        if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39) return true;
        keyChar = String.fromCharCode(key);

        if (!/\d/.test(keyChar)) return false;

    });

});


$(function () {
    $("#slider-range_three").slider({
        // orientation: "vertical",
        // step: 10,
        range: true
        , min: getParams().minimalAvailableCost
        , max: getParams().maximalAvailableCost
        , values: [getParams().currentMinCost, getParams().currentMaxCost]
        , slide: function (event, ui) {
            $("#amount_three").val(ui.values[0]);
            $("#amount_1_three").val(ui.values[1]);
        }
    });
    $("#amount_three").val($("#slider-range_three").slider("values", 0));
    $("#amount_1_three").val($("#slider-range_three").slider("values", 1));

    $("input#amount_1_three").change(function () {
        var value1 = $("input#amount_three").val();
        var value2 = $("input#amount_1_three").val();

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            $("input#amount_1_three").val(value2);
        }
        $("#slider-range_three").slider("values", 1, value2);
    });
    jQuery('#amount_three, #amount_1_three').keypress(function (event) {
        var key, keyChar;
        if (!event) var event = window.event;

        if (event.keyCode) key = event.keyCode;
        else if (event.which) key = event.which;

        if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39) return true;
        keyChar = String.fromCharCode(key);

        if (!/\d/.test(keyChar)) return false;

    });
});





$(document).ready(
    function () {
        if ($(window).height() > '800') {

            $(window).scroll(function () {

                if (window.scrollY > 105) {
                    $(".navigation").addClass("navigation-fixed").css('top', 0);
                    $(".menu-sidebar").addClass("menu-sidebar-visible").css('top', -280);
                    $(".hidden-link").css('opacity', 0);
                } else {
                    $(".navigation").removeClass("navigation-fixed").css('top', 0);
                    $(".menu-sidebar").removeClass("menu-sidebar-visible").css('top', 0);
                    $(".hidden-link").css('opacity', 1);
                }
                ;
            })
        }
        else {

        }
    }
)
