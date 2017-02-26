<?php
/***
 * @var Apartment $data
 */
$images = $data->getImages();

$this->title = [$data->seo_title, Yii::app()->getModule('yupe')->siteName];
$this->description = $data->seo_description;
$this->keywords = $data->seo_keywords;

Yii::app()->getModule("realty")->addCardTags($data);


//Yii::app()->clientScript->registerMetaTag($data->getImageUrl(100, 100, false), null, null, array('property' => "og:image"));
//Yii::app()->clientScript->registerMetaTag("фывфывфыв", null, null, array('property' => "og:title"));
//Yii::app()->clientScript->registerMetaTag("", null, array('property' => "og:url"));
//Yii::app()->clientScript->registerMetaTag("", null, null, array('property' => "og:site_name"));
//Yii::app()->clientScript->registerMetaTag("", null, null, array('property' => "og:type"));


?>
<style>
    @media screen and (max-width: 450px) {
        .callback-main .callback__wrapper {
            margin: 0
        }
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="view__title font-title"><?= $data->getTitle() ?> </h1>
    </div>
</div>
<div class="row" style="padding-top:10px;">
    <div class="col-lg-8">
        <div class="walp" style="background: #F5F5F5">
            <div class="prew">
                <ul id="lightSlider">
                    <li data-thumb="<?= $data->getImageUrl(100, 100, false); ?>">
                        <a rel="group" class="fancybox" href="<?= $data->getImageUrl(1000, 1000, false); ?>"> <img
                                src="<?= $data->getImageUrl(1000, 1000, false); ?>" alt="<?= $data->getTitle(); ?>"/>
                        </a>
                    </li>
                    <?php foreach ($images as $item): ?>
                        <li data-thumb="<?= $item->getImageUrl(100, 100, false); ?>">
                            <a rel="group" class="fancybox" href="<?= $item->getImageUrl(1000, 1000, false); ?>"> <img
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
            $this->renderPartial("/map/linkOnBuilding", ["building" => $data->building]);
            ?>
            <div class="view__small-info"><span class="view__small-info__name">Дом: </span><span class="main-info"> <a
                        href="<?= $data->building->getUrl() ?>"> <?= $data->building->adres ?> </a></span>
            </div>
            <?php if ($data->building->idDistrict > 0): ?>
                <div class="view__small-info"><span class="view__small-info__name"> Квартал:</span><span
                        class="main-info"> <a
                            href="<?= $data->building->district->getUrl() ?>"> <?= $data->building->district->name ?> </a></span>
                </div>
            <?php endif; ?>
            <?php if ($data->building->idBuilder > 0): ?>
                <div class="view__small-info"><span class="view__small-info__name">Застройщик:</span><span
                        class="main-info"><a
                            href="<?= $data->building->builder->getUrl() ?>"> <?= $data->building->builder->name ?> </a> </span>
                </div>
            <?php endif; ?>
            <div class="view__small-info"><span class="view__small-info__name"> Площадь:</span><span
                    class="main-info"><?= $data->size ?> м<sup>2</sup></span></div>
            <div class="view__small-info"><?= $data->building->getStatusAsString(); ?></span></div>
            <?php if ($data->building->status == STATUS_IN_PROGRESS): ?>
                <div class="view__small-info"><span class="view__small-info__name"> Срок сдачи:</span><span
                        class="main-info "><?= $data->building->getReadyTimes()[$data->building->readyTime] ?></sup></span>
                </div>
            <?php endif; ?>
            <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff"
                 data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable"
                 data-share-style="1" data-mode="share" data-like-text-enable="false" data-mobile-view="true"
                 data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000"
                 data-share-shape="round-rectangle" data-sn-ids="fb.vk.tw.ok." data-share-size="30"
                 data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb."
                 data-pid="1582984" data-counter-background-alpha="1.0" data-following-enable="false"
                 data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons"></div>
         
            <div class="price-page price-apartment"><?= $data->getPriceAsString(); ?></div>
            <div class="b-text-price">
                Обратите внимание: мы не берем никаких комиссий
            </div>
            <div class="callback-main">
                <?php $otherText = "assdsd"; ?>
                <?php $this->widget('application.modules.callback.widgets.CallbackWidget', ["otherText" => $data->getTitle()]); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
        <div class="description">
            <div class="b-description__text font-description">
                <?= $data->longDescription ?>
            </div>
            <hr>
        </div>

    </div>
<span class="project-info-link font-description">
    С полной проектной декларацией вы можете ознакомиться на сайте <?= $data->building->builder->link; ?>
</span>
</div>
