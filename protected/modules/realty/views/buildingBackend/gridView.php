<?php
/**
 * Created by JetBrains PhpStorm.
 * User: БОСС
 * Date: 11.05.16
 * Time: 17:48
 * To change this template use File | Settings | File Templates.
 */
$this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'building-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            [
                'name' => 'image',
                'filter' => false,
                'type' => 'raw',
                'value' => function ($data) {
                    return CHtml::image($data->getImageUrl(40,40), $data->image, ["width" => 40, "height" => 40, "class" => "img-thumbnail"]);
                },
            ],
            'adres',
            [
                'filter' => District::getForDropdown(),
                'name' => 'idDistrict',
                'value' => function ($data) {
                    if ($data->district == null)
                        return "";
                    else
                        return $data->district->name;
                }
            ],
            [
                'filter' => Builder::getForDropdown(),
                'name' => 'idBuilder',
                'value' => function ($data) {
                    if ($data->builder == null)
                        return "";
                    else
                        return $data->builder->name;
                }
            ],
            [
                'filter' => [0 => "Не опубликованные", 1 => "Опубликованные"],
                'name' => 'isPublished',
                'value' => function ($data) {
                    return ($data->isPublished) ? "✔" : "";
                }
            ],
            [
                'filter' => Building::getStatuses(),
                'name' => 'status',
                'value' => function($data) {
                    return Building::getStatuses()[$data->status];
                }
            ],
//            'isShowedOnMap',
//            'shortDescription',
//            'longDescription',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
