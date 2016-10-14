<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-building font-description__card">
        <div class="b-card-background__pic"
             style="background-image: url('<?= $data->getImageUrl(300, 300, false); ?>');">
            <a class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>"> </a>
        </div>
        <div class="b-card-building__info">
            <?= $data->getCardTitle() ?>
        </div>
        <hr>
        <div class="b-card-building__description dotdotdot">
            <?= $data->shortDescription ?>
        </div>
        <div class="b-card-building__btn">
            <a class="btnColor btn next-building" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>






