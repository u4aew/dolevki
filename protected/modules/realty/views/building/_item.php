<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6 building-click">
    <div class="building">
        <div class="building-img" style="background-image: url('<?= $data->getImageUrl(500, 500, false); ?>');">
        </div>
        <div>
            <div class="description-building" style="text-align: center"><p style="font-weight: bold;font-size: 20px">
                    <?= $data->adres ?> </p>
                <hr style="margin: 10px auto 5px auto; width: 80%">
                <div style="height: 83px;overflow: hidden">
                    <?= $data->shortDescription ?>
                </div>
                <hr style="margin: 5px auto 5px auto; width: 80%">
                <a class="next-building" href="<?= $data->getUrl(); ?>"> Подробнее </a>
            </div>
        </div>

    </div>
</div>





