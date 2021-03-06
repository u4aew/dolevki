<?php
/**
 * @var Callback $model
 * @var string $phoneMask
 * @var TbActiveForm $form
 */
?>
<div class="row">
    <div class="callback__wrapper col-sm-12">
        <button class="nav__find btnColor" data-toggle="modal" data-target="#callbackModal">
            <i class="fa fa-fw fa-phone"></i>
            <?= Yii::t('CallbackModule.callback', 'Заказать звонок') ?>
        </button>
    </div>
</div>

<div id="callbackModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="<?= Yii::t('CallbackModule.callback', 'Close') ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Заказать обратный звонок</h4>
            </div>
            <?php $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm',
                [
                    'id' => 'callback-form',
                    'type' => 'vertical',
                    'action' => Yii::app()->createUrl('/callback/callback/send'),
                    'enableClientValidation' => true,
                    'clientOptions' => [
                        'validateOnSubmit' => true,
                        'afterValidate' => 'js:callbackSendForm'
                    ],
                ]
            ); ?>

            <div class="modal-body b-modal">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        Укажите свое имя, номер телефона, время, когда вам будет удобно принять наш звонок, и наш
                        консультант сам вам перезвонит
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <?= $form->errorSummary($model); ?>

                        <div class="row">
                            <div class="col-lg-8">
                                <?= $form->textFieldGroup($model, 'name'); ?>
                            </div>
                        </div>

                        <?php $model->comment = $otherText; ?>
                        <?= $form->hiddenField($model, "comment"); ?>

                        <div class="row">
                            <div class="col-lg-8">
                                <?= $form->maskedTextFieldGroup($model, 'phone', [
                                    'widgetOptions' => [
                                        'mask' => $phoneMask,
                                    ]
                                ]); ?>
                            </div>

                            <div class="col-lg-4" style="padding: 0;">
                                <?= $form->maskedTextFieldGroup($model, 'time', [
                                    'widgetOptions' => [
                                        'mask' => 'H9:M9',
                                        'charMap' => [
                                            'H' => '[0-2]',
                                            'M' => '[0-5]',
                                            '9' => '[0-9]'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-order" id="callback-send">
                    <?= Yii::t('CallbackModule.callback', 'Send request') ?>
                </button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
