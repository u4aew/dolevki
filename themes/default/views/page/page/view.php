<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = [$model->title, Yii::app()->getModule('yupe')->siteName];
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>
<div class="candara-font" style="min-height: 960px;padding: 15px">
    <h1><span class="font-title"><?= $model->title; ?></span></h1>
    <hr>
    <div class="font-description">
        <?= $model->body; ?>
    </div>
</div>