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
    Yii::t('RealtyModule.realty', 'Страницы') => ['/realty/realtyPage/index'],
    Yii::t('RealtyModule.realty', 'Управление'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Страницы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление страницами'), 'url' => ['/realty/realtyPage/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить страницу'), 'url' => ['/realty/realtyPage/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('RealtyModule.realty', 'Страницы'); ?>
        <small><?php echo Yii::t('RealtyModule.realty', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('RealtyModule.realty', 'Поиск страниц');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('realty-page-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('RealtyModule.realty', 'В данном разделе представлены средства управления страницами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'realty-page-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'seo_title',
            'seo_description',
            'seo_keywords',
            'h1',
            [
                'name' => 'type',
                'value' => '$data->getTypeAsString()',
            ],
//            'upper_text',
//            'down_text',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
