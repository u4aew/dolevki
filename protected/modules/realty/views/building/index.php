<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->renderPartial("/map/view",["url" => "/realty/realty/getBuildingsForMap"]);

?>

<?php if($this->beginCache($id)): ?>
    <div class="content-page__main">
        <?php $this->renderPartial("/building/list",["dataProvider" => $dataProvider]); ?>
    </div>
    <?php $this->endCache(); ?>
<?php endif; ?>
