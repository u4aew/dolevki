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
            <?=  $form->textFieldGroup($model, 'id', [
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
            <?=  $form->textFieldGroup($model, 'idBuilding', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('idBuilding'),
                        'data-content' => $model->getAttributeDescription('idBuilding')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'floor', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('floor'),
                        'data-content' => $model->getAttributeDescription('floor')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'rooms', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('rooms'),
                        'data-content' => $model->getAttributeDescription('rooms')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'size', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('size'),
                        'data-content' => $model->getAttributeDescription('size')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'cost', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('cost'),
                        'data-content' => $model->getAttributeDescription('cost')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textAreaGroup($model, 'shortDescription', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('shortDescription'),
                    'data-content' => $model->getAttributeDescription('shortDescription')
                ]
            ]]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textAreaGroup($model, 'longDescription', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('longDescription'),
                    'data-content' => $model->getAttributeDescription('longDescription')
                ]
            ]]); ?>
        </div>
		    </div>
</fieldset>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('RealtyModule.realty', 'Искать Квартиру'),
        ]
    ); ?>

<?php $this->endWidget(); ?>