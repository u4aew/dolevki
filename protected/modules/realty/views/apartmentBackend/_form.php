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
 *   @var $model Apartment
 *   @var $form TbActiveForm
 *   @var $this ApartmentBackendController
 **/
?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#common" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Common"); ?></a></li>
    <li><a href="#images" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Images"); ?></a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="common">

        <?
        $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm', [
                'id'                     => 'apartment-form',
                'enableAjaxValidation'   => false,
                'enableClientValidation' => true,
                'htmlOptions' => ['enctype' => 'multipart/form-data', 'class' => 'well'],
            ]
        );
        ?>

        <div class="alert alert-info">
            <?=  Yii::t('RealtyModule.realty', 'Поля, отмеченные'); ?>
            <span class="required">*</span>
            <?=  Yii::t('RealtyModule.realty', 'обязательны.'); ?>
        </div>

        <?=  $form->errorSummary($model); ?>

        <?=  $form->hiddenField($model, 'idBuilding'); ?>


        <div class='row'>
            <div class="col-sm-7">
                <div class="preview-image-wrapper<?= !$model->getIsNewRecord() && $model->image ? '' : ' hidden' ?>">
                    <div class="btn-group image-settings">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse"
                                data-target="#image-settings"><span class="fa fa-gear"></span></button>
                    </div>
                    <?=
                    CHtml::image(
                        !$model->getIsNewRecord() && $model->image? $model->getImageUrl(200, 200, true) : '#',
                        $model->image,
                        [
                            'class' => 'preview-image img-thumbnail',
                            'style' => !$model->getIsNewRecord() && $model->image ? '' : 'display:none',
                        ]
                    ); ?>
                </div>

                <?php if (!$model->getIsNewRecord() && $model->image): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="delete-file"> <?= Yii::t(
                                'YupeModule.yupe',
                                'Delete the file'
                            ) ?>
                        </label>
                    </div>
                <?php endif; ?>

                <?= $form->fileFieldGroup(
                    $model,
                    'image',
                    [
                        'widgetOptions' => [
                            'htmlOptions' => [
//                            'onchange' => 'readURL(this);',
                            ],
                        ],
                    ]
                ); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-7">
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
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?=  $form->textFieldGroup($model, 'maxFloor', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('maxFloor'),
                            'data-content' => $model->getAttributeDescription('maxFloor')
                        ]
                    ]
                ]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?=  $form->dropDownListGroup($model, 'rooms', [
                    'widgetOptions' => [
                        "data" => Apartment::getRoomsArray(),
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('rooms'),
                            'data-content' => $model->getAttributeDescription('rooms')
                        ]
                    ]
                ]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
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
        </div>
        <div class="row">
            <div class="col-sm-7">
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
        </div>
        <div class="row">
            <div style="width: 400px" class="col-sm-12 <?= $model->hasErrors('shortDescription') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'shortDescription'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'shortDescription',
                    ]
                ); ?>
                <p class="help-block"></p>
                <?= $form->error($model, 'shortDescription'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 <?= $model->hasErrors('longDescription') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'longDescription'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'longDescription',
                    ]
                ); ?>
                <p class="help-block"></p>
                <?= $form->error($model, 'longDescription'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?=  $form->textFieldGroup($model, 'seo_title', [
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
                <?=  $form->textFieldGroup($model, 'seo_description', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('seo_description'),
                            'data-content' => $model->getAttributeDescription('seo_description')
                        ]
                    ]
                ]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?=  $form->textFieldGroup($model, 'seo_keywords', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('seo_keywords'),
                            'data-content' => $model->getAttributeDescription('seo_keywords')
                        ]
                    ]
                ]); ?>
            </div>
        </div>


        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'htmlOptions'=> ['class' => 'btn-primary'],
                'label'      => Yii::t('RealtyModule.realty', 'Сохранить Квартиру и закрыть'),
            ]
        ); ?>

        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'htmlOptions'=> ['name' => 'submit-type', 'value' => 'update'],
                'label'      => Yii::t('RealtyModule.realty', 'Сохранить Квартиру и продолжить'),
            ]
        ); ?>

        <?php $this->endWidget(); ?>
    </div>
    <div class="tab-pane" id="images">
        <?php if ($model->isNewRecord):?>
            <h2>Сначала сохраните основную информацию о квартире</h2>
        <?php else:?>
            <?php
            $imageModel = new RealtyImage();
            $imageModel->idTable = RealtyImage::$TABLE_APARTMENT;
            $imageModel->idRecord = $model->id;
            $this->renderPartial("/realtyImageBackend/_form",["model" => $imageModel]);
            ?>
        <?php endif; ?>
    </div>
</div>
