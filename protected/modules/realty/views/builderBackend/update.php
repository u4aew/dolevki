<?php
/**
 * Отображение для update:
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
    $model->name => ['/realty/builder/view', 'id' => $model->id],
    Yii::t('RealtyModule.realty', 'Редактирование'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Застройщики - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Застройщиками'), 'url' => ['/realty/builderBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Застройщика'), 'url' => ['/realty/builderBackend/create']],
    ['label' => Yii::t('RealtyModule.realty', 'Застройщик') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('RealtyModule.realty', 'Редактирование Застройщика'), 'url' => [
        '/realty/builderBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('RealtyModule.realty', 'Просмотреть Застройщика'), 'url' => [
        '/realty/builderBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('RealtyModule.realty', 'Удалить Застройщика'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/realty/builderBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('RealtyModule.realty', 'Вы уверены, что хотите удалить Застройщика?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Редактирование') . ' ' . Yii::t('RealtyModule.realty', 'Застройщика'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model, "buildingModel" => $buildingModel]); ?>