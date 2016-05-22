<?php
/**
 * Отображение для view:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('RealtyModule.realty', 'Дома') => ['/backend/realty/building/index'],
    $model->id,
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Дома - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Домами'), 'url' => ['/realty/building/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Дом'), 'url' => ['/realty/building/create']],
    ['label' => Yii::t('RealtyModule.realty', 'Дом') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('RealtyModule.realty', 'Редактирование Дома'), 'url' => [
        '/realty/building/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('RealtyModule.realty', 'Просмотреть Дом'), 'url' => [
        '/realty/building/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('RealtyModule.realty', 'Удалить Дом'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/realty/building/delete', 'id' => $model->id],
        'confirm' => Yii::t('RealtyModule.realty', 'Вы уверены, что хотите удалить Дом?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Просмотр') . ' ' . Yii::t('RealtyModule.realty', 'Дома'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'image',
        'adres',
        'longitude',
        'latitude',
        'idDistrict',
        'idBuilder',
        'isPublished',
        'isShowedOnMap',
        'shortDescription',
        'longDescription',
        'status',
        'readyTime',
    ],
]); ?>
