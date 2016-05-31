<?php
/** @var Building $data */
?>
<div class="col-lg-4 col-md-6 col-sm-6 product-box">
    <div class="product-box__card">
        <h3> <?=$data->adres ?></h3>
        <p> <img src="<?= $data->getImageUrl(300, 300, false); ?>" class="image-product" alt="Картинка"> </div>
    <div class="product-box__info">
        <p> <?=$data->shortDescription ?> </p>
        <p>
            <a href="<?=$data->getUrl(); ?>">Смотреть</a>
        </p>
        <hr> </div>
</div>


