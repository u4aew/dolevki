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
    Yii::t('RealtyModule.realty', 'Время сдачи') => ['/realty/readyTimeBackend/index'],
    Yii::t('RealtyModule.realty', 'Добавление'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Время сдачи - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление Время сдачи'), 'url' => ['/realty/readyTimeBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить Время сдачи'), 'url' => ['/realty/readyTimeBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('RealtyModule.realty', 'Время сдачи'); ?>
        <small><?php echo Yii::t('RealtyModule.realty', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>