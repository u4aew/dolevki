<?php
/** @var Apartment $data */
?>
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="b-card-apartment b-card-apartment-search font-description__card">
        <div class="b-card-background__pic ApartmentPic"
             style="background-image: url('<?= $data->getImageUrl(); ?>')">
            <a class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>">
                <div class="b-card-apartment__pic-mark">
                    <?php if ($data->building != null): ?>
                        <?php if ($data->building->status == STATUS_IN_PROGRESS) : ?>
                            <?= $data->building->getReadyTimes()[$data->building->readyTime] ?>
                        <?php else: ?>
                            <?= $data->building->getStatusAsString(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php foreach ($data->getImages() as $item): ?>
                    <a rel="group" class="fancybox" href="<?= $item->getImageUrl(); ?>"></a>
                <?php endforeach; ?>
            </a>
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
        <div class="b-card-apartment__info">
            <div class="b-card-apartment__info__street">
                <?= $data->building->adres ?>
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
            <a class="btnColor btn next-apartment btnColor" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>


<!--
<div class="col-lg-10 col-lg-offset-1 col-xs-12 iteam-product">
    <div class="row" style="padding:10px; background-color: white; margin-left: 10px; margin-right: 10px">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:0px">
            <div class="product-image" style="background-image: url('<? /*= $data->getImageUrl(500, 500, false); */ ?>');">
                <div class="hover-title">
                    <p><? /*= $data->building->district->name */ ?></p>
                    <hr style="margin-top:5px;margin-bottom:10px;width:70%">
                    <p> <? /*= $data->building->shortDescription */ ?></p>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-lg-12"
                     style="text-align:center;padding-top:10px;font-weight:bold; font-size: 20px"> <? /*= $data->building->adres */ ?>
                    <hr style="margin-top:5px;margin-bottom:10px">
                </div>
            </div>
            <div class="row" style="padding:0px">
                <div class="col-lg-12 col-md-12 col-sm-12" style="font-size: 16px; text-align: center">
                    <p style="margin:0px"> <? /*= $data->getRoomsAsString() */ ?> на <? /*= $data->getFloorAsString(); */ ?></p>
                    <p style="margin:0px"> Площадь: <? /*= $data->size */ ?> М<sup>2</sup></p>
                    <?php /*if ($data->building != null): */ ?>
                        <p style="margin:0px"> <p
                            style="margin:0px;"> <? /*= $data->building->getReadyTimes()[$data->building->readyTime] */ ?></p> </p>
                    <?php /*endif; */ ?>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-12">
                    <div class="price-page"><? /*= $data->getPriceAsString(); */ ?></div>
                </div>

            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-lg-12"><a class="btnColor link-next-product" href="<? /*= $data->getUrl(); */ ?>">
                        ПОДРОБНЕЕ </a></div>

            </div>
        </div>
        <div>

        </div>
    </div>


</div>-->