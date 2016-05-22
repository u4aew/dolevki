      $(function () {
            $("#slider-range").slider({
                // orientation: "vertical",
                // step: 10,
                range: true
                , min: 17
                , max: 82
                , values: [17, 82]
                , slide: function (event, ui) {
                    $("#amount").val(ui.values[0]);
                    $("#amount_1").val(ui.values[1]);
                }
            });
            $("#amount").val($("#slider-range").slider("values", 0));
            $("#amount_1").val($("#slider-range").slider("values", 1));

            // Изменение местоположения ползунка при вводиде данных в первый элемент input
            $("input#amount").change(function () {
                var value1 = $("input#amount").val();
                var value2 = $("input#amount_1").val();
                if (parseInt(value1) > parseInt(value2)) {
                    value1 = value2;
                    $("input#amount").val(value1);
                }
                $("#slider-range").slider("values", 0, value1);
            });

            // Изменение местоположения ползунка при вводиде данных в второй элемент input 	
            $("input#amount_1").change(function () {
                var value1 = $("input#amount").val();
                var value2 = $("input#amount_1").val();

                if (parseInt(value1) > parseInt(value2)) {
                    value2 = value1;
                    $("input#amount_1").val(value2);
                }
                $("#slider-range").slider("values", 1, value2);
            });

            // фильтрация ввода в поля
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
                , min: 800000
                , max: 10000000
                , values: [800000, 10000000]
                , slide: function (event, ui) {
                    $("#amount_two").val(ui.values[0]);
                    $("#amount_1_two").val(ui.values[1]);
                }
            });
            $("#amount_two").val($("#slider-range_two").slider("values", 0));
            $("#amount_1_two").val($("#slider-range_two").slider("values", 1));

            // Изменение местоположения ползунка при вводиде данных в первый элемент input
            $("input#amount_two").change(function () {
                var value1 = $("input#amount_two").val();
                var value2 = $("input#amount_1_two").val();
                if (parseInt(value1) > parseInt(value2)) {
                    value1 = value2;
                    $("input#amount_two").val(value1);
                }
                $("#slider-range_two").slider("values", 0, value1);
            });

            // Изменение местоположения ползунка при вводиде данных в второй элемент input 	
            $("input#amount_1_two").change(function () {
                var value1 = $("input#amount_two").val();
                var value2 = $("input#amount_1_two").val();

                if (parseInt(value1) > parseInt(value2)) {
                    value2 = value1;
                    $("input#amount_1_two").val(value2);
                }
                $("#slider-range_two").slider("values", 1, value2);
            });

            // фильтрация ввода в поля
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
            $("#slider-range_two_mobile").slider({
                // orientation: "vertical",
                // step: 10,
                range: true
                , min: 800000
                , max: 10000000
                , values: [800000, 10000000]
                , slide: function (event, ui) {
                    $("#amount_two_mobile").val(ui.values[0]);
                    $("#amount_1_two_mobile").val(ui.values[1]);
                }
            });
            $("#amount_two_mobile").val($("#slider-range_two_mobile").slider("values", 0));
            $("#amount_1_two_mobile").val($("#slider-range_two_mobile").slider("values", 1));

            // Изменение местоположения ползунка при вводиде данных в первый элемент input
            $("input#amount_two_mobile").change(function () {
                var value1 = $("input#amount_two_mobile").val();
                var value2 = $("input#amount_1_two_mobile").val();
                if (parseInt(value1) > parseInt(value2)) {
                    value1 = value2;
                    $("input#amount_two_mobile").val(value1);
                }
                $("#slider-range_two_mobile").slider("values", 0, value1);
            });

            // Изменение местоположения ползунка при вводиде данных в второй элемент input 	
            $("input#amount_1_two_mobile").change(function () {
                var value1 = $("input#amount_two_mobile").val();
                var value2 = $("input#amount_1_two_mobile").val();

                if (parseInt(value1) > parseInt(value2)) {
                    value2 = value1;
                    $("input#amount_1_two_mobile").val(value2);
                }
                $("#slider-range_two_mobile").slider("values", 1, value2);
            });

            // фильтрация ввода в поля
            jQuery('#amount_two_mobile, #amount_1_two_mobile').keypress(function (event) {
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
            $("#slider-range_mobile").slider({
                // orientation: "vertical",
                // step: 10,
                range: true
                , min: 17
                , max: 82
                , values: [17, 82]
                , slide: function (event, ui) {
                    $("#amount_mobile").val(ui.values[0]);
                    $("#amount_1_mobile").val(ui.values[1]);
                }
            });
            $("#amount_mobile").val($("#slider-range_mobile").slider("values", 0));
            $("#amount_1_mobile").val($("#slider-range_mobile").slider("values", 1));

            // Изменение местоположения ползунка при вводиде данных в первый элемент input
            $("input#amount").change(function () {
                var value1 = $("input#amount_mobile").val();
                var value2 = $("input#amount_1_mobile").val();
                if (parseInt(value1) > parseInt(value2)) {
                    value1 = value2;
                    $("input#amount_mobile").val(value1);
                }
                $("#slider-range_mobile").slider("values", 0, value1);
            });

            // Изменение местоположения ползунка при вводиде данных в второй элемент input 	
            $("input#amount_1_mobile").change(function () {
                var value1 = $("input#amount_mobile").val();
                var value2 = $("input#amount_1_mobile").val();

                if (parseInt(value1) > parseInt(value2)) {
                    value2 = value1;
                    $("input#amount_1_mobile").val(value2);
                }
                $("#slider-range_mobile").slider("values", 1, value2);
            });

            // фильтрация ввода в поля
            jQuery('#amount_mobile, #amount_1_mobile').keypress(function (event) {
                var key, keyChar;
                if (!event) var event = window.event;

                if (event.keyCode) key = event.keyCode;
                else if (event.which) key = event.which;

                if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39) return true;
                keyChar = String.fromCharCode(key);

                if (!/\d/.test(keyChar)) return false;

            });

        });
  