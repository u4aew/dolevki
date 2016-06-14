<?php
/** @var Building $data */
?>

<div class="row" style="padding-top:10px ">
    <div class="col-lg-8">
        <h1 style="font-size:20px;font-weigth:bold;text-transform:uppercase;"><?=$data->adres?> </h1>
        <div class="preview" style="background-color: white">
            <div class="product-image-iteam" id="bigimg"  style="background-image: url(<?= $data->getImageUrl(1000, 1000, false); ?>);"> </div>
        </div>
    </div>
    <div class="col-lg-4" style="padding-top: 50px">
        <?php if (!is_null($data->builder)): ?>
            <p class="view__small-info">Застройщик:<span class="main-info"><a
                        href="<?= $data->builder->getUrl() ?>"> <?= $data->builder->name ?> </a> </span>
            </p>
        <?php endif; ?>
        <?php if (!is_null($data->district)): ?>
            <p class="view__small-info"> Район: <span class="main-info"> <a href="<?= $data->district->getUrl() ?>"> <?= $data->district->name ?> </a> </span> </p>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
        <div class="description">
            <p> <b>ОПИСАНИЕ </b></p>
            <?=$data->longDescription?>
            <hr>
            <div class="row">
                <?php
                $criteria = new CDbCriteria();
                $criteria->select = 't.*';
                $criteria->compare("idBuilding",$data->id);

                $data = new CActiveDataProvider(
                    'Apartment',
                    [
                        'criteria' => $criteria,
                        'pagination' => [
                            'pageSize' => (int)Yii::app()->getModule('realty')->itemsPerPage,
                            'pageVar' => 'page',
                        ],
                        /*                'sort' => [
                                            'sortVar' => 'sort',
                                            'defaultOrder' => 't.position'
                                        ],
                          */          ]
                );
                $this->renderPartial("/apartment/list",["dataProvider" => $data]);
                ?>
            </div>
        </div>
    </div>
</div>