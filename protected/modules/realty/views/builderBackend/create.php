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
    Yii::t('RealtyModule.realty', 'Застройщики') => ['/backend/realty/builder/index'],
    Yii::t('RealtyModule.realty', 'Добавление'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Застройщики - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Застройщиками'), 'url' => ['/realty/builderBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Застройщика'), 'url' => ['/realty/builderBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('RealtyModule.realty', 'Застройщики'); ?>
        <small><?=  Yii::t('RealtyModule.realty', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>