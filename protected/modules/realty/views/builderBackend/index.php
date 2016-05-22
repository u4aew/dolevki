<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('RealtyModule.realty', 'Застройщики') => ['/backend/realty/builder/index'],
    Yii::t('RealtyModule.realty', 'Управление'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Застройщики - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Застройщиками'), 'url' => ['/realty/builderBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Застройщика'), 'url' => ['/realty/builderBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Застройщики'); ?>
        <small><?=  Yii::t('RealtyModule.realty', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('RealtyModule.realty', 'Поиск Застройщиков');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('builder-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('RealtyModule.realty', 'В данном разделе представлены средства управления Застройщиками'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'builder-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'name',
            'shortDescription',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
