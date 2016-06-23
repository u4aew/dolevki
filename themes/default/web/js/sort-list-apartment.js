$(document).ready(
    function () {
        $('#js-name-select-sort-apartment-parameter').click(
            function () {
                $(".list-parameter-apartement").toggle()
            }
        );


        $('.list-parameter-apartement__item').click(function()
        {
            var href = $(this).parent().attr('href');
            if(href){
                var url = href.split('?'),
                    params = $.deparam.querystring('?'+ (url[1] || ''));


                var updateUrl = $.param.querystring(url[0], params);
                window.History.pushState({url: updateUrl}, document.title, decodeURIComponent(updateUrl));
            }

            var SelectName = $(this).text();
            $('#js-name-select-sort-apartment-parameter').text(SelectName);
            $(".list-parameter-apartement").hide();
            return false;
        });

    }
)