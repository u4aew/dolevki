<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => ['class' => 'well'],
    ]
);
?>

<fieldset>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('id'),
                        'data-content' => $model->getAttributeDescription('id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
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
		<div class="col-sm-3">
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
		<div class="col-sm-3">
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
		<div class="col-sm-3">
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
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'type', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('type'),
                        'data-content' => $model->getAttributeDescription('type')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'upper_text', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('upper_text'),
                        'data-content' => $model->getAttributeDescription('upper_text')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'down_text', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('down_text'),
                        'data-content' => $model->getAttributeDescription('down_text')
                    ]
                ]
            ]); ?>
        </div>
		    </div>
</fieldset>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('RealtyModule.realty', 'Искать страницу'),
        ]
    ); ?>

<?php $this->endWidget(); ?>