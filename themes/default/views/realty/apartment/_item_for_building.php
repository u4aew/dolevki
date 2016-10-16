<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-apartment font-description__card">
        <div class="b-card-background__pic ApartmentPic"
             style="background-image: url('<?= $data->getImageUrl(); ?>')">
            <a rel="group" class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>"> </a>
            <?php foreach ($data->getImages() as $item): ?>
                <a rel="group" class="fancybox" href="<?= $item->getImageUrl(); ?>"></a>
            <?php endforeach; ?>
        </div>
        <div class="b-card-apartment__info">
            <div class="b-card-apartment__info__rooms">
                <?= $data->getRoomsAsString() ?>
            </div>
            <div class="b-card-apartment__info__size">
                <?= $data->size ?> м<sup>2</sup>
            </div>
            <div class="b-card-apartment__info__floor">
                Этаж: <?= $data->getFloor(); ?>
            </div>
        </div>
        <hr style="display: block;margin: 0">
        <div class="b-card-apartment__price">
            <?= $data->getPriceAsString(); ?>
        </div>
        <div class="b-card-apartment__description dotdotdot">
            <?= $data->shortDescription ?>
        </div>
        <hr style="display: block;margin: 0 10px 0 0;">
        <div class="b-card-apartment__btn">
            <a class="btnColor btn next-apartment" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>
<!--<div class="row building__mini-cart">
    <div class="col-lg-2">
        <a href="<? /*= $data->getImageUrl(1000, 1000, false); */ ?>" class="fancybox"> <img class="mini-pic-apart" alt = "<? /*=$data->getTitle(); */ ?>"
                                                                                       src="<? /*= $data->getImageUrl(1000, 1000, false); */ ?>" style="margin:15px auto;display: block;width: 100%;max-width: 100px"> </a>
    </div>
    <div class="col-lg-5" style="padding-top: 15px">
        <div class = "building__mini-cart_short-description">
            <? /*= $data->shortDescription */ ?>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row">
            <div class="col-lg-6" style="padding: 0px">
                <div class="building_apartment_p" style="padding: 15px 0 10px 0">
                    <p style="margin: 0;font-weight: bold">  <? /*= $data->getRoomsAsString() */ ?>, <? /*= $data->size */ ?> м<sup>2</sup></p>
                    <p style="margin: 0">Этаж: <? /*= $data->getFloor(); */ ?> </p>
                </div>
            </div>

            <div class="col-lg-6" style="text-align: left;font-weight: bold;font-size: 24px">
                <div class="building_apartment_pr" style="margin-top: 10px; text-align: center">
                    <p style="margin: 0px"> <? /*=$data->getPriceAsString(); */ ?></p>
                    <p style="margin: 0px">
                        <a  class="btn btn-success next-apartment" href="<? /*=$data->getUrl(); */ ?>">Подробнее</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>-->