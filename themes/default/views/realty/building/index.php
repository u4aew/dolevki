<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view", ["url" => "/realty/realty/getBuildingsForIndexMap"]);

?>

<?php
$dataProvider->getData();
?>
<?php if ($this->beginCache($id . $dataProvider->pagination->currentPage)): ?>
    <div class="content-page__main">
  <div class="slider__main">
      <?php $this->widget(
          "application.modules.slide.widgets.SlideWidget",
          array("view" => "slidewidget",)
      ); ?>
  </div>
        <?php $this->renderPartial("/building/list", ["dataProvider" => $dataProvider]); ?>
    </div>
    <?php $this->endCache(); ?>
<?php endif; ?>
