$(document).ready(
    function () {
        $('#js-name-select-sort-apartment-parameter').click(
            function () {
                $(".list-parameter-apartement").toggle()
                $(".caret").toggleClass("caret__rotate");
            }
        );


        $("#js-name-select-sort-apartment-parameter").hover(
            function () {
                $(".menu-list-sorting-apartement").addClass('menu-list-sorting-apartement__hover');
            },
            function () {
                $(".menu-list-sorting-apartement").removeClass('menu-list-sorting-apartement__hover');
            }
        );


        $('.list-parameter-apartement__item').click(function () {
            var href = $(this).parent().attr('href');
            if (href) {
                var url = href.split('?'),
                    params = $.deparam.querystring('?' + (url[1] || ''));


                var updateUrl = $.param.querystring(url[0], params);
                window.History.pushState({url: updateUrl}, document.title, decodeURIComponent(updateUrl));
            }

            var SelectName = $(this).text();
            $('#js-name-select-sort-apartment-parameter').text(SelectName);
            $(".list-parameter-apartement").hide();
            $(".caret").removeClass("caret__rotate");
            return false;
        });

    }
);
$(function () {
    setTimeout(normalizeImage(), 5000);
    $('.pagination li a').click(function () {
        setTimeout(normalizeImage(), 1000);
    });
    function normalizeImage() {
        var i = 0;
        $(".ApartmentPic").each(function () {
            $(this).children().attr("rel", ++i)
        });
    }
})