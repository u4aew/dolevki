<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view",["url" => "/realty/realty/getBuildingsForMap"]);

?>

<?php
$dataProvider->getData();
?>
<?php if($this->beginCache($id.$dataProvider->pagination->currentPage)): ?>
    <div class="content-page__main">
        <?php $this->renderPartial("/building/list",["dataProvider" => $dataProvider]); ?>
    </div>
    <?php $this->endCache(); ?>
<?php endif; ?>
