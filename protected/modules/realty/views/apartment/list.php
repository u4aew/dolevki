<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

?>

<div class="row">
    <div class="col-lg-12">
        <section>
            <div class="grid">
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

