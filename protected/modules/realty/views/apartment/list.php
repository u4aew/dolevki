<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

?>

<div class="row">
    <div class="col-lg-12">

        <section>
            <div class="grid">
                <div class="box-sorting-apartment" style="text-align: right;margin-top: 15px">
                    <ul class="menu-list-sorting-apartement">
                        <li class="menu-list-sorting-apartement__item">Сортировароть по :</li>
                        <li class="menu-list-sorting-apartement__item"><span id="js-name-select-sort-apartment-parameter">  Стоимости </span>
                            <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                            <ul class="list-parameter-apartement">
                                <li class="list-parameter-apartement__item">
                                    Стоимости
                                </li>
                                <li class="list-parameter-apartement__item">
                                    Этажу
                                </li>
                                <li class="list-parameter-apartement__item">
                                    Кол-во комнат
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php $this->widget(
                    'bootstrap.widgets.TbListView',
                    [
                        'template'=>'{summary} {sorter} {items} <hr> {pager}',
                        'sorterHeader'=>'Сортировать по:',
                        // ключи, которые были описаны $sort->attributes
                        // если не описывать $sort->attributes, можно использовать атрибуты модели
                        // настройки CSort перекрывают настройки sortableAttributes
                        'sortableAttributes'=>array('cost', 'floor', 'rooms'),

                        'dataProvider' => $dataProvider,
                        'itemView' => isset($itemPath) ? '/apartment/'.$itemPath : '/apartment/_item',
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

