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

