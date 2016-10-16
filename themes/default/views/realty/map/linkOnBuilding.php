<?php
/**
 * @var Buidling $building
 */
?>
<?php
Yii::app()->clientScript->registerScriptFile("https://api-maps.yandex.ru/2.1/?lang=ru_RU");
?>
<script type="text/javascript">
    ymaps.ready(function () {

        var myMap;

        $('.show-building').fancybox({
            height: 600, afterShow: function () {

                myMap = new ymaps.Map('onMap', {
                    center: [<?=$building->latitude;?>,<?=$building->longitude?>],
                    zoom: 15
                });

                var myPlacemark = new ymaps.Placemark([<?=$building->latitude;?>,<?=$building->longitude?>], {
                    hintContent: '<?=$building->adres; ?>'
                }, {
                    balloonMaxWidth: 250
                });

                myMap.geoObjects.add(myPlacemark);

            }, afterClose: function () {
                myMap.destroy();
                myMap = null;
            }
        });
    });
</script>
<p class="view__small-info view__small-info__map"><span class="main-info"> <a
            href="#onMap" class="show-building">Показать на карте</a><span style="margin-left: 5px"
            class="glyphicon glyphicon-map-marker"></span> </span></p>
<div id="onMap" style="width:700px; height:600px; display: none;"></div>
