<h1 class="page_title">
    Застройщики
</h1>


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

