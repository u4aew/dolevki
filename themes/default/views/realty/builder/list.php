<h1 class="page_title font-title">
    Застройщики
</h1>

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
                            'itemView' => '/builder/_itemBuild',
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
