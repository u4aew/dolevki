<?php
/** @var Building $data */

$this->title = $data->getPageTitle();
$this->description = $data->getPageDescription();
$this->keywords = $data->getPageKeywords();

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="view__title font-title"><?= $data->name ?> </h1>
        <hr>
        <div class="description">
            <div class="b-description__text font-description">
                <?= $data->shortDescription ?>
            </div>
            <hr>
            <?php
            $criteria = new CDbCriteria();
            $criteria->select = 't.*';
            $criteria->compare("isPublished", 1);
            $criteria->compare("idBuilder", $data->id);

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
                      */]
            );
            $this->renderPartial("/building/list", ["dataProvider" => $data]);
            ?>
        </div>

    </div>
</div>

