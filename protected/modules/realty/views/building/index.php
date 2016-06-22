<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view",["url" => "/realty/realty/getBuildingsForMap"]);

?>

<div class="content-page__main">
<?php $this->renderPartial("/building/list",["dataProvider" => $dataProvider]); ?>
</div>