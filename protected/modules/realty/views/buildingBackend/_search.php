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
            <?=  $form->textFieldGroup($model, 'image', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('image'),
                        'data-content' => $model->getAttributeDescription('image')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'adres', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('adres'),
                        'data-content' => $model->getAttributeDescription('adres')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'longitude', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('longitude'),
                        'data-content' => $model->getAttributeDescription('longitude')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'latitude', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('latitude'),
                        'data-content' => $model->getAttributeDescription('latitude')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'idDistrict', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('idDistrict'),
                        'data-content' => $model->getAttributeDescription('idDistrict')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'idBuilder', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('idBuilder'),
                        'data-content' => $model->getAttributeDescription('idBuilder')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'isPublished', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('isPublished'),
                        'data-content' => $model->getAttributeDescription('isPublished')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'isShowedOnMap', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('isShowedOnMap'),
                        'data-content' => $model->getAttributeDescription('isShowedOnMap')
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
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'status', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'readyTime', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('readyTime'),
                        'data-content' => $model->getAttributeDescription('readyTime')
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
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('RealtyModule.realty', 'Искать Дом'),
        ]
    ); ?>

<?php $this->endWidget(); ?>