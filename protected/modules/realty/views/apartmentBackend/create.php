<?php
/**
 * Отображение для create:
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
    "Дом ".$model->idBuilding => ['/backend/realty/building/update/'.$model->idBuilding],
    Yii::t('RealtyModule.realty', 'Добавление квартиры'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Квартиры - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Квартирами'), 'url' => ['/realty/apartmentBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Квартиру'), 'url' => ['/realty/apartmentBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Квартиры'); ?>
        <small><?=  Yii::t('RealtyModule.realty', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>