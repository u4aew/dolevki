<?php if (isset($title)): ?>
    <h1 class="page_title font-title"><?=$title; ?></h1>
<?php endif; ?>

<?php if (isset($map)): ?>
    <?php $this->renderPartial("/map/view",["url" => "/realty/realty/getBuildingsForMap", "map" => $map]); ?>
<?php endif; ?>


<?php
$dataProvider->getData();
?>
<?php if($this->beginCache(Yii::app()->request->url.$dataProvider->pagination->currentPage)): ?>

   <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="grid">
                    <?php $this->widget(
                        'bootstrap.widgets.TbListView',
                        [
                            'dataProvider' => $dataProvider,
                            'itemView' => '/building/_item',
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


    <?php $this->endCache(); ?>
<?php endif; ?>
