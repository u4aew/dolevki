<h1 class="page_title font-title">
    Кварталы
</h1>

<?php $this->renderPartial("/map/view", ["url" => "/realty/realty/getBuildingsForMap", "map" => "district"]); ?>

<?php
$dataProvider->getData();
?>
<?php if ($this->beginCache(Yii::app()->controller->id . Yii::app()->controller->action->id . $dataProvider->pagination->currentPage)): ?>


    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="grid">
                    <?php $this->widget(
                        'bootstrap.widgets.TbListView',
                        [
                            'dataProvider' => $dataProvider,
                            'itemView' => '/district/_item',
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


    <?php $this->endCache(); ?>
<?php endif; ?>
