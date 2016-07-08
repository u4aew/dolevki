<?php
/**
 * @var Buidling $building
 */
?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script type="text/javascript">
    ymaps.ready(function  () {

        var myMap;

        $('.show-building').fancybox({height:600,afterShow : function() {

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

        }, afterClose:function (){
            myMap.destroy();
            myMap = null;
        }});
    });
</script>
<p class="view__small-info"><span class="main-info"> <a
            href="#onMap" class="show-building">Показать на карте</a> </span></p>
<div id="onMap" style="width:700px; height:600px; display: none;"></div>