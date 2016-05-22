<?php
/**
* Отображение для realtyBackend/index
*
* @category YupeView
* @package  yupe
* @author   Yupe Team <team@yupe.ru>
* @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
* @link     http://yupe.ru
**/
$this->breadcrumbs = [
    Yii::t('RealtyModule.realty', 'realty') => ['/realty/realtyBackend/index'],
    Yii::t('RealtyModule.realty', 'Index'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'realty - index');

$this->menu = $this->getModule()->getNavigation();
?>

<div class="page-header">
    <h1>
        <?php echo Yii::t('RealtyModule.realty', 'realty'); ?>
        <small><?php echo Yii::t('RealtyModule.realty', 'Index'); ?></small>
    </h1>
</div>