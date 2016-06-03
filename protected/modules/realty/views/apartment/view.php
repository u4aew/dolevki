<?php
/***
 * @var Apartment $data
 */
$images = $data->getImages();
?>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">x</button>
                <h4 class="modal-title" id="myModalLabel">Обратный звонок</h4>
            </div>
            <div class="modal-body">
                <h3>Введите номер телефона</h3>
                <input  type="text" name="phone" class="form-control" placeholder="+7 XXX XXX XX XX">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" type="button">Заказать</button>
            </div>
        </div>
    </div>
</div>
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
            <button data-toggle="modal" data-target="#basicModal" class="callback"> Обратный звонок</button>
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