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
        <h1 class="view__title"><?= $data->getTitle() ?> </h1>
    </div>
</div>
<div class="row" style="padding-top:10px ">
    <div class="col-lg-8">
        <div class="walp" style="background: #F5F5F5">
            <div class="prew">
                <ul id="lightSlider">
                    <li data-thumb="<?= $data->getImageUrl(100, 100, false); ?>">
                        <a class="fancybox" href="<?= $data->getImageUrl(1000, 1000, false); ?>"> <img
                                src="<?= $data->getImageUrl(1000, 1000, false); ?>"/> </a>
                    </li>
                    <?php foreach ($images as $item): ?>
                        <li data-thumb="<?= $item->getImageUrl(100, 100, false); ?>">
                            <a class="fancybox" href="<?= $item->getImageUrl(1000, 1000, false); ?>"> <img
                                    src="<?= $item->getImageUrl(1000, 1000, false); ?>"> </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <p class="view__small-info">Дом:<span class="main-info"> <a href="<?= $data->building->getUrl() ?>"> <?= $data->building->adres ?> </a></span>
        </p>
        <?php if ($data->building->idDistrict > 0): ?>
            <p class="view__small-info">Квартал:<span class="main-info"> <a href="<?= $data->building->district->getUrl() ?>"> <?= $data->building->district->name ?> </a></span>
            </p>
        <?php endif; ?>
        <?php if ($data->building->idBuilder > 0): ?>
            <p class="view__small-info">Застройщик:<span class="main-info"><a
                        href="<?= $data->building->builder->getUrl() ?>"> <?= $data->building->builder->name ?> </a> </span>
            </p>
        <?php endif; ?>
        <p class="view__small-info">Площадь:<span class="main-info"><?= $data->size ?> м<sup>2</sup></span></p>
        <p class="view__small-info"><?= $data->building->getStatusAsString(); ?></span></p>
        <?php if ($data->building->status == STATUS_IN_PROGRESS): ?>
            <p class="view__small-info">Срок сдачи:<span
                    class="main-info"><?= $data->building->getReadyTimes()[$data->building->readyTime] ?></sup></span>
            </p>
        <?php endif; ?>
        <hr>
        <div class="price-page"><?= $data->getPriceAsString(); ?></div>
        <hr>
        <div>
            <?php $otherText = "assdsd"; ?>
            <?php $this->widget('application.modules.callback.widgets.CallbackWidget',["otherText" => $data->getTitle()]); ?>
        </div>
        <hr>
        <div style="text-align:center">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
        <div class="description">
            <p><b>ОПИСАНИЕ </b></p>
            <?= $data->longDescription ?>

            <hr>
        </div>

    </div>
</div>