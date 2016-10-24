<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model RealtyPage
 *   @var $form TbActiveForm
 *   @var $this RealtyPageController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'realty-page-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('RealtyModule.realty', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('RealtyModule.realty', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'seo_title', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('seo_title'),
                        'data-content' => $model->getAttributeDescription('seo_title')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textAreaGroup($model, 'seo_description', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('seo_description'),
                    'data-content' => $model->getAttributeDescription('seo_description')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textAreaGroup($model, 'seo_keywords', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('seo_keywords'),
                    'data-content' => $model->getAttributeDescription('seo_keywords')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'h1', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('h1'),
                        'data-content' => $model->getAttributeDescription('h1')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'type', [
                'widgetOptions' => [
                    "data" => $model->getTypes(),
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('type'),
                        'data-content' => $model->getAttributeDescription('type')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textAreaGroup($model, 'upper_text', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'rows' => 6,
                        'cols' => 50,
                        'data-original-title' => $model->getAttributeLabel('upper_text'),
                        'data-content' => $model->getAttributeDescription('upper_text')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textAreaGroup($model, 'down_text', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'rows' => 6,
                        'cols' => 50,
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('down_text'),
                        'data-content' => $model->getAttributeDescription('down_text')
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('RealtyModule.realty', 'Сохранить страницу и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('RealtyModule.realty', 'Сохранить страницу и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>