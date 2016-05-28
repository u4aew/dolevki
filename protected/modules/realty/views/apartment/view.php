<?php
$images = $data->getImages();
?>
<div class="row" style="padding-top:10px ">
    <div class="col-lg-8">
        <h1 style="font-size:20px;font-weight:bold;text-transform:uppercase;"><?=$data->getRoomsAsString()?> </h1>
        <div class="demo">
            <ul id="lightSlider">
                <li data-thumb="<?= $data->getImageUrl(100,100,false); ?>">
                    <a class="fancybox"  href="<?= $data->getImageUrl(1000,1000,false); ?>"> <img  src="<?= $data->getImageUrl(1000,1000,false); ?>" /> </a>
                </li>
                <?php foreach ($images as $item):?>
                    <li data-thumb="<?= $item->getImageUrl(100,100,false);?>">
                        <a class="fancybox"  href="<?= $item->getImageUrl(1000,1000,false);?>"> <img src="<?= $item->getImageUrl(1000,1000,false);?>"> </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="col-lg-4">
        <h3 style="text-align:center">ПАРАМЕТРЫ </h3>
        <p style="text-align:center;font-weight:bold"> Название района</p>
        <p style="text-align:center;font-weight:bold"> <?=$data->building->adres?></p>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <p>  <?=$data->getRoomsAsString()?></p>
                <p> Площадь: <?=$data->size?> м <sup>2 </sup></p>

            </div>
            <div class="col-lg-6 col-sm-6">
                <p> Этаж: <?=$data->floor?> </p>
                <p> <?=$data->building->getReadyTimes()[$data->building->readyTime]?></p>
            </div>
        </div>
        <hr>
        <div class="price-page"> <?=$data->cost?> &#8381; </div>
        <hr>
        <div style="text-align:center">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
        <div class="description">
            <p> <b>ОПИСАНИЕ </b></p>
            <?=$data->longDescription?>

            <hr>
        </div>

    </div>
</div>
<style>
    .demo {
        width:100%;
    }
    ul {
        list-style: none outside none;
        padding-left: 0;
        margin-bottom:0;
    }
    li {
        display: block;
        float: left;
        margin-right: 6px;
        cursor:pointer;
    }
    .demo ul li img {
        display: block;
        max-height: 300px;
        max-width: 100%;
        margin: 0 auto;
        padding-right: 1px;
    }
</style>