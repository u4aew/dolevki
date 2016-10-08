<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-building">
        <div class="b-card-building__pic"
             style="background-image: url('<?= $data->getImageUrl(300, 300, false); ?>');">
            <div class="b-card-building__pic-mark">
                Информация
            </div>
        </div>
        <div class="b-card-building__info">
            <?= $data->getCardTitle() ?>
        </div>
        <hr>
        <div class="b-card-building__description">
            <?= $data->shortDescription ?>
        </div>
        <div class="b-card-building__btn">
            <a class="btn next-building btnColor" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>






