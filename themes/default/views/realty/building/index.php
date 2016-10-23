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
