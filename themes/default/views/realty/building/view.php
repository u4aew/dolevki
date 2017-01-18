<?php
/** @var Building $data */
$title = $data->adres;
if ($_GET["page"] > 1) {
    $title .= ", страница " . $_GET["page"];
}
$this->title = [$data->seo_title, Yii::app()->getModule('yupe')->siteName];
$this->description = $data->seo_description;
$this->keywords = $data->seo_keywords;
Yii::app()->getModule("realty")->addCardTags($data);
?>
<div class="row">
    <div>
        <div class="col-lg-8">
            <h1 class="view__title font-title"><?= $data->adres ?> </h1>
            <div class="walp" style="background: #F5F5F5">
                <div class="prew">
                    <ul id="lightSlider">
                        <li data-thumb="<?= $data->getImageUrl(100, 100, false); ?>">
                            <a rel="group-building" class="fancybox"
                               href="<?= $data->getImageUrl(1000, 1000, false); ?>"> <img
                                    src="<?= $data->getImageUrl(1000, 1000, false); ?>"
                                    alt="<?= $data->getTitle(); ?>"/>
                            </a>
                        </li>
                        <?php foreach ($data->getImages() as $item): ?>
                            <li data-thumb="<?= $item->getImageUrl(100, 100, false); ?>">
                                <a rel="group-building" class="fancybox"
                                   href="<?= $item->getImageUrl(1000, 1000, false); ?>"> <img
                                        src="<?= $item->getImageUrl(1000, 1000, false); ?>" alt=""> </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="font-description">
                <?php
                $this->renderPartial("/map/linkOnBuilding", ["building" => $data]);
                ?>
                <?php if (!is_null($data->builder)): ?>
                    <div class="view__small-info"><span class="view__small-info__name"> Застройщик:</span> <span
                            class="main-info"><a
                                href="<?= $data->builder->getUrl() ?>"> <?= $data->builder->name ?> </a> </span>
                    </div>
                <?php endif; ?>
                <?php if (!is_null($data->district)): ?>
                    <p class="view__small-info"><span class="view__small-info__name"> Район: </span><span
                            class="main-info"> <a
                                href="<?= $data->district->getUrl() ?>"> <?= $data->district->name ?> </a> </span></p>
                <?php endif; ?>
                <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff"
                     data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable"
                     data-share-style="1" data-mode="share" data-like-text-enable="false" data-mobile-view="true"
                     data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000"
                     data-share-shape="round-rectangle" data-sn-ids="fb.vk.tw.ok." data-share-size="30"
                     data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb."
                     data-pid="1582984" data-counter-background-alpha="1.0" data-following-enable="false"
                     data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons"></div>

                <p class="view__small-info">
                    <?= $data->longDescription ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">
        <div class="description">
            <div class="row box-apartment">
                  <span class="apartments-header font-title">
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
                        $this->renderPartial("/apartment/building-list", ["dataProvider" => $dataProv, "itemPath" => "_item_for_building", "headerText" => "Квартиры в этом доме"]);
                        ?>
                        <?php $this->endCache(); ?>
                    <?php endif; ?>
                </div>
                <span class="project-info-link font-description">
                    С полной проектной декларацией вы можете ознакомиться на сайте застройщика <?= $data->builder->link; ?>
                </span>

            </div>
        </div>
    </div>
</div>