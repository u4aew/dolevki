<?php
/** @var Building $data */
$title = $data->adres;
if ($_GET["page"] > 1) {
    $title .= ", страница " . $_GET["page"];
}
$this->title = [$title, Yii::app()->getModule('yupe')->siteName];
$this->description = $data->getPageDescription();
$this->keywords = $data->getPageKeywords();
?>
<div class="row">
    <div>
        <div class="col-lg-8">
            <h1 class="view__title"><?= $data->adres ?> </h1>
            <div class="preview">
                <div class="product-image-iteam" id="bigimg"
                     style="background-image: url(<?= $data->getImageUrl(1000, 1000, false); ?>);"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <?php
            $this->renderPartial("/map/linkOnBuilding", ["building" => $data]);
            ?>
            <?php if (!is_null($data->builder)): ?>
                <p class="view__small-info">Застройщик:<span class="main-info"><a
                            href="<?= $data->builder->getUrl() ?>"> <?= $data->builder->name ?> </a> </span>
                </p>
            <?php endif; ?>
            <?php if (!is_null($data->district)): ?>
                <p class="view__small-info"> Район: <span class="main-info"> <a
                            href="<?= $data->district->getUrl() ?>"> <?= $data->district->name ?> </a> </span></p>
            <?php endif; ?>
            <p class="view__small-info">
            <div class="candara-font">
                <?= $data->longDescription ?>
            </div>
            </p>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">
        <div class="description">
            <div class="row box-apartment">
                  <span class="apartments-header">
                            Квартиры в этом доме
                        </span>
                <?php
                $criteria = new CDbCriteria();
                $criteria->select = 't.*';
                $criteria->compare("idBuilding", $data->id);

                $dataProv = new CActiveDataProvider(
                    'Apartment',
                    [
                        'criteria' => $criteria,
                        'pagination' => [
                            'pageSize' => (int)Yii::app()->getModule('realty')->itemsPerPage,
                            'pageVar' => 'page',
                        ],
                        'sort' => array(
                            'defaultOrder' => 'cost DESC',
                        )
                        /*                'sort' => [
                                            'sortVar' => 'sort',
                                            'defaultOrder' => 't.position'
                                        ],
                          */]
                );

                $dataProv->getData();
                $sortString = Yii::app()->request->getParam("Apartment_sort");
                if (is_null($sortString))
                    $sortString = "";
                ?>
                <div class="b-apartment">
                    <?php if ($this->beginCache(Yii::app()->request->url . $dataProv->pagination->currentPage . $sortString)): ?>
                        <?php
                        $this->renderPartial("/apartment/list", ["dataProvider" => $dataProv, "itemPath" => "_item_for_building", "headerText" => "Квартиры в этом доме"]);
                        ?>
                        <?php $this->endCache(); ?>
                    <?php endif; ?>
                </div>
                <span class="project-info-link">
                    С полной проектной декларацией вы можете ознакомиться на сайте застройщика <?= $data->builder->link; ?>
                </span>

            </div>
        </div>
    </div>
</div>