<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6 building-click">
    <div class="building">
        <div class="building-img" style="background-image: url('<?= $data->getImageUrl(300, 300, false); ?>');">
        </div>
        <div>
            <div class="description-building" style="text-align: center">
                <div class="building-heid">  <?= $data->getCardTitle() ?> </div>
                <hr style="margin: 10px auto 5px auto; width: 80%">
                <div style="height: 135px;overflow: hidden">
                    <div style="margin: auto"><?= $data->shortDescription ?></div>
                </div>
                <hr style="margin: 5px auto 5px auto; width: 80%">
                <a class="next-building" href="<?= $data->getUrl(); ?>"> Подробнее </a>
            </div>
        </div>
    </div>
</div>





