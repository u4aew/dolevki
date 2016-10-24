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
<div style="min-height: 960px;padding: 15px">
    <h1><span class="font-title"><?= $model->title; ?></span></h1>
    <hr>
    <div class="font-description">
        <?= $model->body; ?>
    </div>
    <div>
        <div style="padding: 10px 0;margin:0 auto;max-width: 100%;overflow: hidden">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=3wadJF4ajj_gwBTNltqSeKb6xwwM4elS&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
        </div>
    </div>
</div>