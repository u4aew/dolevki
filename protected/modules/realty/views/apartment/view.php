<?php
/***
 * @var Apartment $data
 */
$images = $data->getImages();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 style="font-size:24px;font-weight:bold;text-transform:uppercase;"><?= $data->getTitle() ?> </h1>
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
        <?php if ($data->building->idDistrict > 0):?>
            <p class="view__small-info">Квартал:<span class = "main-info"><?= $data->building->district->name?></span></p>
        <?php endif; ?>
        <?php if ($data->building->idBuilder > 0):?>
            <p class="view__small-info">Застройщик:<span class = "main-info"><?= $data->building->builder->name?></span></p>
        <?php endif; ?>
        <p class="view__small-info">Площадь:<span class = "main-info"><?= $data->size?> м<sup>2</sup></span></p>
        <p class="view__small-info"><?=$data->building->getStatusAsString();?></span></p>
        <?php if ($data->building->status == STATUS_IN_PROGRESS):?>
            <p class="view__small-info">Срок сдачи:<span class = "main-info"><?= $data->building->getReadyTimes()[$data->building->readyTime] ?></sup></span></p>
        <?php endif; ?>
        <hr>
        <div class="price-page"><?=$data->getPriceAsString(); ?></div>
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