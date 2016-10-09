<?php
/***
 * @var Apartment $data
 */
$images = $data->getImages();

$this->title = $data->getPageTitle();
$this->description = $data->getPageDescription();
$this->keywords = $data->getPageKeywords();


?>
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
                        <a class="fancybox" href="<?= $data->getImageUrl(1000, 1000, false); ?>"> <img
                                src="<?= $data->getImageUrl(1000, 1000, false); ?>" alt="<?= $data->getTitle(); ?>"/>
                        </a>
                    </li>
                    <?php foreach ($images as $item): ?>
                        <li data-thumb="<?= $item->getImageUrl(100, 100, false); ?>">
                            <a class="fancybox" href="<?= $item->getImageUrl(1000, 1000, false); ?>"> <img
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
            <div class="price-page price-apartment"><?= $data->getPriceAsString(); ?></div>
            <div class="b-text-price">
                Обратите внимание: мы не берем никаких комиссий
            </div>
            <div>
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
    С полной проектной декларацией вы можете ознакомиться на сайте застройщика <?= $data->building->builder->link; ?>
</span>
</div>
