<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="b-card-building font-description__card">
        <div class="b-card-building__pic ApartmentPic"
             style="background-image: url('<?= $data->getImageUrl(300, 300, false); ?>');">
            <a rel="group" class="fancybox b-card-background__link" href="<?= $data->getImageUrl(); ?>">
                <div class="b-card-apartment__pic-mark">
                    <?php if ($data->status == STATUS_IN_PROGRESS) :?>
                        <?= $data->getReadyTimes()[$data->readyTime] ?>
                    <?php else: ?>
                        <?= $data->getStatusAsString(); ?>
                    <?php endif; ?>
                </div>
                <?php foreach ($data->getImages() as $item): ?>
                    <a rel="group" class="fancybox" href="<?= $item->getImageUrl(); ?>"></a>
                <?php endforeach; ?>
            </a>
        </div>
        <div class="b-card-building__info">
            <?= $data->getCardTitle() ?>
        </div>
        <hr>
        <div class="b-card-building__description dotdotdot">
            <?= $data->shortDescription ?>
        </div>
        <div class="clearfix"></div>
        <div class="b-card-building__btn">
            <a class="btnColor btn next-building" href="<?= $data->getUrl(); ?>"> Подробнее</a> </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>






