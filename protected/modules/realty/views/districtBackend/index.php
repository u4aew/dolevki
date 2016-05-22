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
    Yii::t('RealtyModule.realty', 'Кварталы') => ['/backend/realty/district/index'],
    Yii::t('RealtyModule.realty', 'Управление'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Кварталы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Кварталами'), 'url' => ['/realty/district/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Квартал'), 'url' => ['/realty/district/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Кварталы'); ?>
        <small><?=  Yii::t('RealtyModule.realty', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('RealtyModule.realty', 'Поиск Кварталов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('district-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('RealtyModule.realty', 'В данном разделе представлены средства управления Кварталами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'district-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'name',
            [
                'name' => 'icon',
                'filter' => false,
                'type' => 'raw',
                'value' => function ($data) {
                    return CHtml::image($data->getImageUrl(40,40), $data->icon, ["width" => 40, "height" => 40, "class" => "img-thumbnail"]);
                },
            ],
            'longitude',
            'latitude',
//            'longDescription',
            [
                'filter' => [0 => "Не опубликованные", 1 => "Опубликованные"],
                'name' => 'isPublished',
                'value' => function ($data) {
                    return ($data->isPublished) ? "✔" : "";
                }
            ],
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
