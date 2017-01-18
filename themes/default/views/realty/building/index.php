<?php if (isset($page)): ?>
    <h1 class="page_title font-title">
        <?= $page->h1; ?>
    </h1>

    <div class="top-text">
        <?= $page->upper_text; ?>
    </div>
<?php endif; ?>
<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view", ["url" => "/realty/realty/getBuildingsForIndexMap"]);

?>

<?php
$dataProvider->getData();
?>
<?php if ($this->beginCache($id . $dataProvider->pagination->currentPage)): ?>
    <div class="slider__main hidden-xs">
        <?php $this->widget(
            "application.modules.slide.widgets.SlideWidget",
            array("view" => "slidewidget",)
        ); ?>
    </div>
    <div class="content-page__main">
        <?php $this->renderPartial("/building/list", ["dataProvider" => $dataProvider]); ?>
    </div>
    <?php $this->endCache(); ?>
<?php endif; ?>
<?php if (isset($page)): ?>
    <div class="down-text">
        <?= $page->down_text; ?>
    </div>
<?php endif; ?>
