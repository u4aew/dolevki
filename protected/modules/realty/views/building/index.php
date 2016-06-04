<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view",["url" => "/realty/realty/getBuildingsForMap"]);

$this->renderPartial("/building/list",["dataProvider" => $dataProvider]);

?>
