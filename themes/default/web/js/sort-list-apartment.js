$(document).ready(
    function () {
        $('#js-name-select-sort-apartment-parameter').click(
            function () {
                $(".list-parameter-apartement").toggle()
            }
        )
        $('.list-parameter-apartement__item').click(
            function () {
                var SelectName = $(this).text();
                $('#js-name-select-sort-apartment-parameter').text(SelectName);
                $(".list-parameter-apartement").hide();
            }
        )

    }
)