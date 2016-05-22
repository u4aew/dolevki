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
    Yii::t('RealtyModule.realty', 'Кварталы') => ['/backend/realty/district/index'],
    $model->name => ['/backend/realty/district/view', 'id' => $model->id],
    Yii::t('RealtyModule.realty', 'Редактирование'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Кварталы - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Кварталами'), 'url' => ['/realty/district/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Квартал'), 'url' => ['/realty/district/create']],
    ['label' => Yii::t('RealtyModule.realty', 'Квартал') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('RealtyModule.realty', 'Редактирование Квартала'), 'url' => [
        '/realty/district/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('RealtyModule.realty', 'Просмотреть Квартал'), 'url' => [
        '/realty/district/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('RealtyModule.realty', 'Удалить Квартал'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/realty/district/delete', 'id' => $model->id],
        'confirm' => Yii::t('RealtyModule.realty', 'Вы уверены, что хотите удалить Квартал?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Редактирование') . ' ' . Yii::t('RealtyModule.realty', 'Квартала'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model,"buildingModel" => $buildingModel]); ?>