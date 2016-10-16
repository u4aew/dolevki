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
 *   @var $model Building
 *   @var $form TbActiveForm
 *   @var $this BuildingController
 **/
?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#common" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Common"); ?></a></li>
    <li><a href="#apartments" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Apartments"); ?></a></li>
    <li><a href="#images" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Images"); ?></a></li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="common">

    <?php

    $form = $this->beginWidget(
        '\yupe\widgets\ActiveForm',
        [
            'id' => 'product-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'type' => 'vertical',
            'htmlOptions' => ['enctype' => 'multipart/form-data', 'class' => 'well'],
            'clientOptions' => [
                'validateOnSubmit' => true,
            ],
        ]
    );
    ?>

    <div class="alert alert-info">
        <?=  Yii::t('RealtyModule.realty', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?=  Yii::t('RealtyModule.realty', 'обязательны.'); ?>
    </div>

    <?=  $form->errorSummary($model); ?>

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
    </div>

    <div class="row">
        <div class="col-sm-7">
            <?= $form->slugFieldGroup($model, 'slug', ['sourceAttribute' => 'adres']); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-7">
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
    </div>
    <div class="row">
        <div class="col-sm-7">
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
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php ?>
            <?=  $form->dropDownListGroup($model, 'idDistrict', [
                'widgetOptions' => [
                    'data' => District::getForDropdown(),
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('idDistrict'),
                        'data-content' => $model->getAttributeDescription('idDistrict')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php ?>
            <?=  $form->dropDownListGroup($model, 'idBuilder', [
                'widgetOptions' => [
                    'data' => Builder::getForDropdown(),
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('idBuilder'),
                        'data-content' => $model->getAttributeDescription('idBuilder')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->checkboxGroup($model, 'isPublished', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('isPublished'),
                        'data-content' => $model->getAttributeDescription('isPublished')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->checkboxGroup($model, 'isShowedOnMap', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('isShowedOnMap'),
                        'data-content' => $model->getAttributeDescription('isShowedOnMap')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="width: 400px" <?= $model->hasErrors('shortDescription') ? 'has-error' : ''; ?>">
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
            <?=  $form->dropDownListGroup($model, 'status', [
                'widgetOptions' => [
                    'data' => Building::getStatuses(),
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->dropDownListGroup($model, 'readyTime', [
                'widgetOptions' => [
                    'data' => Building::getReadyTimes(),
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('readyTime'),
                        'data-content' => $model->getAttributeDescription('readyTime')
                    ]
                ]
            ]); ?>
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
            'context'    => 'primary',
            'label'      => Yii::t('RealtyModule.realty', 'Сохранить Дом и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('RealtyModule.realty', 'Сохранить Дом и закрыть'),
        ]
    ); ?>

    <?php $this->endWidget(); ?>
</div>
<div class="tab-pane" id="apartments">
    <?php if ($model->isNewRecord):?>
        <h2>Сначала сохраните основную информацию о доме</h2>
    <?php else:?>
        <?php
        $this->widget(
            'yupe\widgets\CustomGridView',
            [
                'actionsButtons' => [
                    CHtml::link(
                        Yii::t('YupeModule.yupe', 'Add'),
                        $this->createUrl("/backend/realty/apartment/create?idBuilding=".$model->id),
                        ['class' => 'btn btn-success pull-right btn-sm']
                    ),
                ],
                'ajaxUpdate' => false,
                'id'           => 'apartment-grid',
                'type'         => 'striped condensed',
                'dataProvider' => $model->getApartment()->search(),
                'filter'       => $model->getApartment(),
                'columns'      => [
                    [
                        'name' => 'image',
                        'filter' => false,
                        'type' => 'raw',
                        'value' => function ($data) {
                            return CHtml::image($data->getImageUrl(40,40), $data->image, ["width" => 40, "height" => 40, "class" => "img-thumbnail"]);
                        },
                    ],
                    [
                        'name' => 'floor',
                        'value' => '$data->getFloor()',
                    ],
                    'size',
                    'cost',
                    [
                        'name' => 'rooms',
                        'value' => '$data->getRoomsAsString()',
                    ],
                    [
                        'class' => 'yupe\widgets\CustomButtonColumn',
                        "updateButtonUrl" => function($data)
                        {
                            return "/backend/realty/apartment/update?id=".$data->id;
                        },
                        "deleteButtonUrl" => function($data)
                        {
                            return "/backend/realty/apartment/delete?id=".$data->id;
                        },
                    ],
                ],
            ]
        ); ?>
    <?php endif; ?>
</div>
<div class="tab-pane" id="images">
    <?php if ($model->isNewRecord):?>
        <h2>Сначала сохраните основную информацию о доме</h2>
    <?php else:?>
        <?php
        $imageModel = new RealtyImage();
        $imageModel->idTable = RealtyImage::$TABLE_BUILDING;
        $imageModel->idRecord = $model->id;
        $this->renderPartial("/realtyImageBackend/_form",["model" => $imageModel]);
        ?>
    <?php endif; ?>
</div>
</div>
