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
 *   @var $model Builder
 *   @var $form TbActiveForm
 *   @var $this BuilderBackendController
 **/
?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#common" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Common"); ?></a></li>
    <li><a href="#buildings" data-toggle="tab"><?= Yii::t("RealtyModule.realty", "Buildings"); ?></a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="common">


        <?php
        $form = $this->beginWidget(
            '\yupe\widgets\ActiveForm',
            [
                'id'                     => 'builder-form',
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

        <div class="row">
            <div class="col-sm-7">
                <?=  $form->textFieldGroup($model, 'name', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('name'),
                            'data-content' => $model->getAttributeDescription('name')
                        ]
                    ]
                ]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->slugFieldGroup($model, 'slug', ['sourceAttribute' => 'name']); ?>
            </div>
        </div>

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
                <?=  $form->textFieldGroup($model, 'link', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'class' => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('link'),
                            'data-content' => $model->getAttributeDescription('link')
                        ]
                    ]
                ]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 <?= $model->hasErrors('shortDescription') ? 'has-error' : ''; ?>">
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
                'label'      => Yii::t('RealtyModule.realty', 'Сохранить Застройщика и продолжить'),
            ]
        ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
                'label'      => Yii::t('RealtyModule.realty', 'Сохранить Застройщика и закрыть'),
            ]
        ); ?>

        <?php $this->endWidget(); ?>

    </div>
    <div class="tab-pane" id="buildings">
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
                            $this->createUrl("/backend/realty/building/create?idBuilder=".$model->id),
                            ['class' => 'btn btn-success pull-right btn-sm']
                        ),
                    ],
                    'ajaxUpdate' => false,
                    'id'           => 'building-grid',
                    'type'         => 'striped condensed',
                    'ajaxUpdate' => false,
                    'dataProvider' => $buildingModel->search(),
                    'filter'       => $buildingModel,
                    'columns'      => [
                        [
                            'name' => 'image',
                            'filter' => false,
                            'type' => 'raw',
                            'value' => function ($data) {
                                return CHtml::image($data->getImageUrl(40,40), $data->image, ["width" => 40, "height" => 40, "class" => "img-thumbnail"]);
                            },
                        ],
                        'adres',
                        [
                            'filter' => District::getForDropdown(),
                            'name' => 'idDistrict',
                            'value' => function ($data) {
                                if ($data->district == null)
                                    return "";
                                else
                                    return $data->district->name;
                            }
                        ],
                        [
                            'filter' => [0 => "Не опубликованные", 1 => "Опубликованные"],
                            'name' => 'isPublished',
                            'value' => function ($data) {
                                return ($data->isPublished) ? "✔" : "";
                            }
                        ],
                        [
                            'filter' => Building::getStatuses(),
                            'name' => 'status',
                            'value' => function($data) {
                                return Building::getStatuses()[$data->status];
                            }
                        ],
                        //            'isShowedOnMap',
                        //            'shortDescription',
                        //            'longDescription',
                        [
                            'class' => 'yupe\widgets\CustomButtonColumn',
                            "updateButtonUrl" => function($data)
                            {
                                return "/backend/realty/building/update?id=".$data->id."&";
                            },
                            "deleteButtonUrl" => function($data)
                            {
                                return "/backend/realty/building/delete?id=".$data->id;
                            },
                        ],
                    ],
                ]
            ); ?>
        <?php endif; ?>
    </div>
</div>
