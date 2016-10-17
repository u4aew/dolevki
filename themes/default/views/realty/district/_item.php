<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-district font-description__card">
        <div class="b-card-district__pic ApartmentPic"
             style="background-image: url('<?= $data->getImageUrl(300, 300, false); ?>');">
            <a class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>">
            </a>
        </div>
        <div class="b-card-district__info">
            <?= $data->getCardTitle() ?>
        </div>
        <hr>
        <div class="b-card-district__description dotdotdot">
           
        </div>
        <div class="clearfix"></div>
        <div class="b-card-district__btn">
            <a class="btnColor btn next-apartment" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>






