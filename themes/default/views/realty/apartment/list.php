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

?>
<div class="content-page__main">
    <div class="row">
        <div class="col-lg-4">
            <div class="b-find b-find-Color ">
                <div class="b-find-wrap">
                    <div class="b-find__title">Параметры Поиска</div>
                    <form id="searchForm" action="/search" method="get">
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
                                <div class="b-find__param-name">Стоимость, <span class="rubl"> руб.</span>
                                    <div id="slider-range_two"></div>
                                </div>
                                <div>
                                    <div style="float:left">
                                        <b>ОТ</b>
                                        <input type="text" id="amount_two"
                                               class="amount_two js-cost-textbox" style="width: 80px">
                                    </div>

                                    <div style="float: right">
                                        <b>ДО</b>
                                        <input type="text" id="amount_1_two"
                                               class="amount1_two js-cost-textbox" style="width: 80px">
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
                            <div>
                                <div class="b-find__param-name">Тип жилья</div>
                                <select multiple class="sumoSelect" name="" id="status"
                                        data-placeholder="Тип искомого жилья">
                                    <option id="inProgress"
                                            value="<?= STATUS_IN_PROGRESS ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_IN_PROGRESS, $_GET["status"]) !== false) echo "selected" ?>>
                                        Строящееся жилье
                                    </option>
                                    <option
                                        value="<?= STATUS_READY ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_READY, $_GET["status"]) !== false) echo "selected" ?> >
                                        Готовые новостройки
                                    </option>
                                    <option
                                        value="<?= STATUS_RESELL ?>" <?php if (isset($_GET["status"]) && array_search(STATUS_RESELL, $_GET["status"]) !== false) echo "selected" ?> >
                                        Вторичная продажа
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
