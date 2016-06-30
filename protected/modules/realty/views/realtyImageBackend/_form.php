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
 *   @var $model RealtyImage
 *   @var $form TbActiveForm
 *   @var $this RealtyImageBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action' => $this->createUrl("/backend/realty/realtyImage/create"),
        'id'                     => 'realty-image-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions' => ['enctype' => 'multipart/form-data', 'class' => 'well'],
    ]
);
?>

     <?=  $form->hiddenField($model, 'idRecord') ;?>
     <?=  $form->hiddenField($model, 'idTable'); ?>

    <div class='row'>
        <div class="col-sm-7">
            <div class="preview-image-wrapper<?= !$model->getIsNewRecord() && $model->path ? '' : ' hidden' ?>">
                <div class="btn-group image-settings">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse"
                            data-target="#image-settings"><span class="fa fa-gear"></span></button>
                </div>
                <?=
                CHtml::image(
                    !$model->getIsNewRecord() && $model->path? $model->getImageUrl(200, 200, true) : '#',
                    $model->path,
                    [
                        'class' => 'preview-image img-thumbnail',
                        'style' => !$model->getIsNewRecord() && $model->path ? '' : 'display:none',
                    ]
                ); ?>
            </div>

            <?php if (!$model->getIsNewRecord() && $model->path): ?>
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
                'path',
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

<?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('RealtyModule.realty', 'Загрузить изображение'),
        ]
    ); ?>



<?php
$criteria = new CDbCriteria();
$criteria->compare("idTable",$model->idTable);
$criteria->compare("idRecord",$model->idRecord);
$images = RealtyImage::model()->findAll($criteria);
?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image): ?>
            <tr>
                <td>
                    <img src="<?= $image->getImageUrl(100, 100); ?>" alt="" class="img-responsive"/>
                </td>
                <td class="text-center">
                    <a data-id="<?= $image->id; ?>" href="<?= $this->createUrl(
                        '/backend/realty/realtyImage/delete?id='.$image->id); ?>"
                       class="btn btn-default product-delete-image"><i
                            class="fa fa-fw fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $this->endWidget(); ?>