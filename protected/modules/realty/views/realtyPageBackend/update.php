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
    Yii::t('RealtyModule.realty', 'Страницы') => ['/realty/realtyPage/index'],
    $model->id => ['/realty/realtyPage/view', 'id' => $model->id],
    Yii::t('RealtyModule.realty', 'Редактирование'),
];

$this->pageTitle = Yii::t('RealtyModule.realty', 'Страницы - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('RealtyModule.realty', 'Управление страницами'), 'url' => ['/realty/realtyPage/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('RealtyModule.realty', 'Добавить страницу'), 'url' => ['/realty/realtyPage/create']],
    ['label' => Yii::t('RealtyModule.realty', 'Страница') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('RealtyModule.realty', 'Редактирование страницы'), 'url' => [
        '/realty/realtyPage/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('RealtyModule.realty', 'Просмотреть страницу'), 'url' => [
        '/realty/realtyPage/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('RealtyModule.realty', 'Удалить страницу'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/realty/realtyPage/delete', 'id' => $model->id],
        'confirm' => Yii::t('RealtyModule.realty', 'Вы уверены, что хотите удалить страницу?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('RealtyModule.realty', 'Редактирование') . ' ' . Yii::t('RealtyModule.realty', 'страницы'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>