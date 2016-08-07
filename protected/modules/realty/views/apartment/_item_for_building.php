<div class="row building__mini-cart">
    <div class="col-lg-2">
        <a href="<?= $data->getImageUrl(1000, 1000, false); ?>" class="fancybox"> <img class="mini-pic-apart" alt = "<?=$data->getTitle(); ?>"
                                                                                       src="<?= $data->getImageUrl(1000, 1000, false); ?>" style="margin:15px auto;display: block;width: 100%;max-width: 100px"> </a>
    </div>
    <div class="col-lg-5" style="padding-top: 15px">
        <div class = "building__mini-cart_short-description">
            <?= $data->shortDescription ?>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row">
            <div class="col-lg-6" style="padding: 0px">
                <div class="building_apartment_p" style="padding: 15px 0 10px 0">
                    <p style="margin: 0;font-weight: bold">  <?= $data->getRoomsAsString() ?>, <?= $data->size ?> м<sup>2</sup></p>
                    <p style="margin: 0">Этаж: <?= $data->getFloor(); ?> </p>
                </div>
            </div>

            <div class="col-lg-6" style="text-align: left;font-weight: bold;font-size: 24px">
                <div class="building_apartment_pr" style="margin-top: 10px; text-align: center">
                    <p style="margin: 0px"> <?=$data->getPriceAsString(); ?></p>
                    <p style="margin: 0px">
                        <a  class="btn btn-success next-apartment" href="<?=$data->getUrl(); ?>">Подробнее</a> </p>

                </div>
            </div>
        </div>
    </div>
</div>