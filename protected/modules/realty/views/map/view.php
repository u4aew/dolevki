<?php
/**
 * Created by JetBrains PhpStorm.
 * User: БОСС
 * Date: 28.05.16
 * Time: 15:19
 * To change this template use File | Settings | File Templates.
 */
?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script type="text/javascript">
    var myMap;
    ymaps.ready(function () {
        myMap = new ymaps.Map("map", {
            center: [53.354058, 83.73335],
            zoom: 10.5
        });

        var objectManager = new ymaps.ObjectManager({
            // Использовать кластеризацию.
            clusterize: true
        });
//        objectManager.objects.options.set('preset', 'islands#greenDotIcon');
//        objectManager.clusters.options.set('preset', 'islands#greenClusterIcons');
        myMap.geoObjects.add(objectManager);

        jQuery.getJSON('<?= $url; ?>', function (json) {
            objectManager.add(json);
            isLoaded = true;
        });
     });
    function showMap()
    {
        $("#map").slideToggle(400,function(){myMap.container.fitToViewport();});
    }
</script>
<div class="row map__container">
    <div id="map" class="map__map"  style = "height: 600px; width: 100%; display: none">

    </div>
    <div class="map__button" onclick="showMap();">
        Показать карту
    </div>
</div>

