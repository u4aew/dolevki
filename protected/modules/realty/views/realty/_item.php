<div class="col-lg-10 col-lg-offset-1 col-xs-12 iteam-product">
                        <div class="row" style="padding:0px">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:0px">
                                <div class="product-image" style="background-image: url('<?= $data->getImageUrl(500, 500, false); ?>');">
                                    <div class="hover-title">
                                        <p><?=$data->building->district->name ?></p>
                                        <hr style="margin-top:5px;margin-bottom:10px;width:70%">
                                        <p> <?=$data->building->shortDescription ?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center;padding-top:10px;font-weight:bold"> <?=$data->building->adres?>
                                        <hr style="margin-top:5px;margin-bottom:10px">
                                    </div>
                                </div> 
                                <div class="row" style="padding:0px">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p style="margin:0px"> Этаж <?=$data->floor?></p>
                                        <p style="margin:0px"> <?=$data->getRoomsAsString()?> </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p style="margin:0px"> Площать: <?=$data->size?> М<sup>2</sup> </p>
                                        <p style="margin:0px"> Срок сдачи: <p style="margin:0px;"> <?=$data->building->getReadyTimes()[$data->building->readyTime]?></p> </p>     
                                    </div>

                                </div>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-lg-12">
                                        <div class="price-page"> 80 000 00 &#8381; </div>
                                    </div>

                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-lg-12"> <a class="link-next-product" href="<?=$data->getUrl(); ?>"> ПОДРОБНЕЕ </a> </div>

                                </div>


                            </div>
                            <div>

                            </div>
                        </div>


                    </div>