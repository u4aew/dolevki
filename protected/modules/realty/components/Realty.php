<?php


class Realty extends CApplicationComponent
{


    public function getLinkOnMe($obj)
    {
        return "<br><a href = '".$obj->getUrl()."' class = 'map__view-link'>Подробнее</a>";
    }


    public function getYandexMapJson($objects)
    {
        $arr = array("type" => "FeatureCollection", "features" => array());
        foreach ($objects as $item)
        {
            $arr["features"][] = $item->getMapInfo();
        }
        return json_encode($arr,JSON_NUMERIC_CHECK);
    }


    public function getMinimumAvailableCost()
    {
        $criteria = new CDbCriteria();
        $criteria->select = "cost";
        $criteria->order = "cost ASC";
        $criteria->with = [
            "building" => [
                "condition" => "isPublished = 1"
            ]
        ];
        $criteria->limit = 1;
        $apartment = Apartment::model()->find($criteria);
        return intval($apartment->cost);
    }

    public function getMaximumAvailableCost()
    {
        $criteria = new CDbCriteria();
        $criteria->select = "cost";
        $criteria->order = "cost DESC";
        $criteria->with = [
            "building" => [
                "condition" => "isPublished = 1"
            ]
        ];
        $criteria->limit = 1;
        $apartment = Apartment::model()->find($criteria);
        return intval($apartment->cost);
    }

    public function getMinimumAvailableSize()
    {
        $criteria = new CDbCriteria();
        $criteria->select = "size";
        $criteria->order = "size ASC";
        $criteria->with = [
            "building" => [
                "condition" => "isPublished = 1"
            ]
        ];
        $criteria->limit = 1;
        $apartment = Apartment::model()->find($criteria);
        return intval($apartment->size);
    }

    public function getMaximumAvailableSize()
    {
        $criteria = new CDbCriteria();
        $criteria->select = "size";
        $criteria->order = "size DESC";
        $criteria->with = [
            "building" => [
                "condition" => "isPublished = 1"
            ]
        ];
        $criteria->limit = 1;
        $apartment = Apartment::model()->find($criteria);
        return intval($apartment->size);
    }

}