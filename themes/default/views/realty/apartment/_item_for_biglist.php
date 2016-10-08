<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-apartment b-card-apartment-search">
        <div class="b-card-apartment__pic"
             style="background-image: url('<?= $data->getImageUrl(); ?>')">
            <div class="b-card-apartment__pic-mark">
                <?php if ($data->building != null): ?>
                    <?= $data->building->getReadyTimes()[$data->building->readyTime] ?>
                <?php endif; ?>
            </div>
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
        <div class="b-card-apartment__description">
            <?= $data->shortDescription ?>
        </div>
        <hr style="display: block;margin: 0 10px 0 0;">
        <div class="b-card-apartment__btn">
            <a class="btn next-apartment btnColor" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
    </div>
</div>