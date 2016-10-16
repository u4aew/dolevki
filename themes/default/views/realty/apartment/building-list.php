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
        <div class="col-lg-12">
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
                            'afterAjaxUpdate' => 'function(id) { addDotdotdot(); }',
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
