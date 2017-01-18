<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
$sortKeys = ["cost" => "Стоимости", "rooms" => "Кол-ву комнат", "floor" => "Этажу"];


function getUrl($sortAttribute)
{
    $getParams = $_GET;
    foreach ($getParams as $key => $value) {
        if ($key == "Apartment_sort")
            unset($getParams[$key]);
        if ($key == "name")
            unset($getParams[$key]);
    }
    $requestString = http_build_query($getParams);
    $path = Yii::app()->request->pathInfo;

    return "http://{$_SERVER['SERVER_NAME']}/" . $path . "?" . $requestString . "&Apartment_sort=" . $sortAttribute;
}


Yii::app()->getClientScript()->registerScript("sticky", '
   FixedFind();
   $(window).resize(function() {
   FixedFind();
   });
    function FixedFind() {
    if ($(window).width() > 768) {
       var height = $(".footer").height();
    $(".b-find").sticky({topSpacing: 10, bottomSpacing: height + 30});
      }
      else {
      $(".b-find").unstick();
      };
    };     
    ');
?>
<script>
    window.params =
    {
        currentMinCost: <?=Yii::app()->request->getParam("minimalCost", Yii::app()->realty->getMinimumAvailableCost()); ?>,
        currentMaxCost: <?=Yii::app()->request->getParam("maximalCost", Yii::app()->realty->getMaximumAvailableCost()); ?>,
        currentMinSize: <?=Yii::app()->request->getParam("minimalSize", Yii::app()->realty->getMinimumAvailableSize()); ?>,
        currentMaxSize: <?=Yii::app()->request->getParam("maximalSize", Yii::app()->realty->getMaximumAvailableSize()); ?>,
        minimalAvailableCost: <?=Yii::app()->realty->getMinimumAvailableCost(); ?>,
        maximalAvailableCost: <?=Yii::app()->realty->getMaximumAvailableCost(); ?>,
        minimalAvailableSize: <?=Yii::app()->realty->getMinimumAvailableSize(); ?>,
        maximalAvailableSize: <?=Yii::app()->realty->getMaximumAvailableSize(); ?>,
    }
    function getParams() {
        return window.params;
    }
    function sendFilter() {
        var rooms = "";
        $("input[name=rooms]:checked").each(function () {
            if (rooms != "")
                rooms += ","
            rooms += $(this).val();
        });
        var minimalCost = getParams().minimalAvailableCost;
        $(".amount_two").each(function () {
            var currentVal = parseInt($(this).val().replace(new RegExp('[ ]', 'g'), ""));
            minimalCost = Math.max(minimalCost, currentVal);
        });
        var maximalCost = getParams().maximalAvailableCost;
        $(".amount1_two").each(function () {
            var currentVal = parseInt($(this).val().replace(new RegExp('[ ]', 'g'), ""));
            maximalCost = Math.min(maximalCost, currentVal);
        });
        if (minimalCost > maximalCost) {
            var t = maximalCost;
            maximalCost = minimalCost;
            minimalCost = t;
        }
        var minimalSize = getParams().minimalAvailableSize;
        $(".amount").each(function () {
            var currentVal = $(this).val();
            minimalSize = Math.max(minimalSize, currentVal);
        });
        var maximalSize = getParams().maximalAvailableSize;
        $(".amount1").each(function () {
            var currentVal = $(this).val();
            maximalSize = Math.min(maximalSize, currentVal);
        });
        var url = "/poisk?";
        $(".select-room-click-cheked").each(function () {
            url += "rooms[]=" + $(this).data("val") + "&";
        });
        $("#status :selected").each(function () {
            url += "status[]=" + $(this).val() + "&";
        });
        $("#readyTime :selected").each(function () {
            url += "time[]=" + $(this).val() + "&";
        });


        if (rooms != "")
            url += "rooms=" + rooms + "&";
        if (minimalCost > getParams().minimalAvailableCost)
            url += "minimalCost=" + minimalCost + "&";
        if (maximalCost < getParams().maximalAvailableCost)
            url += "maximalCost=" + maximalCost + "&";
        if (minimalSize > getParams().minimalAvailableSize)
            url += "minimalSize=" + minimalSize + "&";
        if (maximalSize < getParams().maximalAvailableSize)
            url += "maximalSize=" + maximalSize + "&";
        if (url.substr(url.length - 1, 1) == "&")
            url = url.substr(0, url.length - 1);
        if (url.substr(url.length - 1, 1) == "?")
            url = url.substr(0, url.length - 1);
        window.location = url;
        return false;
    }

</script>
<div class="content-page__main">
    <div class="row">
        <div class="col-lg-4">
            <div class="b-find b-find-Color ">
                <div class="b-find-wrap">
                    <div class="b-find__title">Параметры Поиска</div>
                    <form id="searchForm" action="/poisk" method="get">
                        <div>
                            <div class="b-find__param-name"> Количество комнат</div>
                            <ul class="select-room">
                                <?php
                                if (!isset($_GET["rooms"]))
                                    $_GET["rooms"] = [];
                                $rooms = [0 => "Студия", "1", "2", "3", "4+"];
                                ?>
                                <?php foreach ($rooms as $key => $value): ?>
                                    <?php
                                    $flag = array_search($key, $_GET["rooms"]);
                                    ?>
                                    <li class="select-room-click <?= ($flag !== false) ? "select-room-click-cheked" : "" ?>"
                                        data-val="<?= $key; ?>"><?= $value; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="clearfix">
                            </div>
                            <hr>
                            <div>
                                <div class="b-find__param-name">Статус готовности</div>
                                <select multiple class="sumoSelect" name="" id="status"
                                        data-placeholder="Тип искомого жилья">
                                    <option id="inProgress"
                                            value="<?= STATUS_IN_PROGRESS ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_IN_PROGRESS, $_GET["status"]) !== false) echo "selected" ?>>
                                        Строящееся дома
                                    </option>
                                    <option
                                        value="<?= STATUS_READY ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_READY, $_GET["status"]) !== false) echo "selected" ?> >
                                        Готовые новостройки
                                    </option>
                                    <option
                                        value="<?= STATUS_RESELL ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_RESELL, $_GET["status"]) !== false) echo "selected" ?> >
                                        Вторичный рынок
                                    </option>
                                </select>
                            </div>
                            <div id="readyTime__container">
                                <div class="b-find__param-name">Срок сдачи</div>
                                <select multiple class="sumoSelect" name="" id="readyTime"
                                        data-placeholder="Интересующее время готовности жилья">
                                    <?php
                                    $times = ReadyTime::model()->findAll();
                                    ?>
                                    <?php foreach ($times as $item): ?>
                                        <option
                                            value="<?= $item->id; ?>" <?php if (isset($_GET["time"]) && array_search($item->id, $_GET["time"]) !== false) echo "selected" ?>><?= $item->text; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <div class="b-find__param-name">Стоимость, <span class="rubl"> руб.</span>
                                    <div id="slider-range_two"></div>
                                </div>
                                <div>
                                    <div style="float:left">
                                        <b>ОТ</b>
                                        <input type="text" id="amount_two"
                                               class="amount_two js-cost-textbox" style="width: 85px">
                                    </div>

                                    <div style="float: right">
                                        <b>ДО</b>
                                        <input type="text" id="amount_1_two"
                                               class="amount1_two js-cost-textbox" style="width: 85px">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div>
                                    <div class="b-find__param-name">Площадь, м<sup>2</sup></div>
                                    <div id="slider-range"></div>
                                    <div>
                                        <div style="margin:0;float: left"><b>ОТ</b> <input type="text" id="amount"
                                                                                           class="amount">
                                        </div>
                                        <div style="margin:0;float: right"><b>ДО</b> <input type="text" id="amount_1"
                                                                                            class="amount1"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div style="clear:both"></div>

                                </div>
                                <hr>
                            </div>
                        </div>
                        <button type="submit" class="nav__find btnColor"
                                onclick="sendFilter();return false; yaCounter4512622.reachGoal('filter'); return true;">
                            Найти квартиры
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <section>
                <div class="grid">

                    <noindex>
                        <div class="box-sorting-apartment">

                            <ul class="menu-list-sorting-apartement">
                                <li class="menu-list-sorting-apartement__item">Сортировать по :</li>
                                <li class="menu-list-sorting-apartement__item"><span
                                        id="js-name-select-sort-apartment-parameter"><?= (isset($_GET["Apartment_sort"])) ? $sortKeys[$_GET["Apartment_sort"]] : "Стоимости" ?>
                                </span> <span class="caret"> </span>
                                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                    <ul class="list-parameter-apartement">
                                        <?php foreach ($sortKeys as $key => $item): ?>
                                            <a href="<?= getUrl($key); ?>">
                                                <li class="list-parameter-apartement__item">
                                                    <?= $item; ?>
                                                </li>
                                            </a>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </noindex>
                    <?php
                    Yii::app()->getClientScript()->registerScript("addSorter", "

                    ");
                    ?>

                    <?php $this->widget(
                        'bootstrap.widgets.TbListView',
                        [
                            'template' => '{summary} {items} <hr> {pager}',
                            'dataProvider' => $dataProvider,
                            'itemView' => isset($itemPath) ? '/apartment/' . $itemPath : '/apartment/_item',
                            'summaryText' => '',
                            'afterAjaxUpdate' => 'function(id) { addDotdotdot(); }',
                            'enableHistory' => true,
                            'cssFile' => false,
                            'itemsCssClass' => 'row items',
                            /*   'sortableAttributes' => [
                                   'sku',
                                   'name',
                                   'price',
                                   'update_time'
                               ],*/
                        ]
                    ); ?>
                </div>
            </section>
        </div>
    </div>
</div>

</div>
