<?php
/** @var Building $data */
?>
<?php
    $images = $data->getImages();
?>
                       <div class="row" style="padding-top:10px ">
                        <div class="col-lg-8">
                            <h1 style="font-size:20px;font-weigth:bold;text-transform:uppercase;"><?=$data->adres?> </h1>
                            <div class="preview">
                                <div class="product-image-iteam" id="bigimg"  style="background-image: url(<?= $data->getImageUrl(1000, 1000, false); ?>);"> </div>
                            </div>
                            <div class="mini-preview">

                                <ul class="image-list">
                                    <?php foreach ($images as $item):?>
                                    <li>
                                        <a href="#" style="background-image: url('<?= $item->getImageUrl(100,100,false);?>');"> <div onclick="document.getElementById('bigimg').style.backgroundImage = url('123.jpg')"> </div> </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h3 style="text-align:center">ПАРАМЕТРЫ </h3>
                            <p style="text-align:center;font-weight:bold"> Название района</p>
                            <p style="text-align:center;font-weight:bold"> <?=$data->adres?></p>
                            <hr>
                            <div class="row">
                            </div>
                            <hr>
                            <hr>
                            <div style="text-align:center">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <dvi class="col-lg-12">
                            <hr>
                            <div class="description"> 
                                <p> <b>ОПИСАНИЕ </b></p>
                             <?=$data->longDescription?>
                            
                             <hr>
                              </div>
                              
                        </dvi>
                        
                    </div>