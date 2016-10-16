<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-apartment b-card-apartment-search font-description__card">
        <div class="b-card-background__pic ApartmentPic"
             style="background-image: url('<?= $data->getImageUrl(); ?>')">
            <a class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>">

                <div class="b-card-apartment__pic-mark">
                    <?php if ($data->building != null): ?>
                        <?= $data->building->getReadyTimes()[$data->building->readyTime] ?>
                    <?php endif; ?>
                </div>
                <?php foreach ($data->getImages() as $item): ?>
                    <a rel="group" class="fancybox" href="<?= $item->getImageUrl(); ?>"></a>
                <?php endforeach; ?>
            </a>
        </div>
        <div class="b-card-apartment__info">
            <div class="b-card-apartment__info__rooms">
                <?= $data->getRoomsAsString() ?> на <?= $data->getFloorAsString(); ?>
            </div>
            <div class="b-card-apartment__info__size">
                <?= $data->size ?> м<sup>2</sup>
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
            <a class="btn next-apartment btnColor" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>