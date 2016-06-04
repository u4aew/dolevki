<?php
/** @var Building $data */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 style="font-size:20px;font-weigth:bold;text-transform:uppercase;"><?=$data->name?> </h1>
        <hr>
        <div class="description">
            <?=$data->shortDescription?>
            <hr>
            <?php
            $criteria = new CDbCriteria();
            $criteria->select = 't.*';
            $criteria->compare("isPublished",1);
            $criteria->compare("idBuilder",$data->id);

            $data = new CActiveDataProvider(
                'Building',
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
            $this->renderPartial("/building/list",["dataProvider" => $data]);
            ?>

        </div>

    </div>
</div>

