<?php

/**
 * Class Money - заглушка для конвертора валют
 */
class Realty extends CApplicationComponent
{


    public function getYandexMapJson($objects)
    {
        $arr = array("type" => "FeatureCollection", "features" => array());
        foreach ($objects as $item)
        {
            $elem = array();
            $elem["type"] = "Feature";
            $elem["id"] = $item->id;
                $elem["geometry"] = array(
                    "type" => "Point",
                    "coordinates" => array($item->latitude,$item->longitude)
                );
                $elem["properties"] = array(
                    "balloonContent" => "asdasdasdasd",
//                "clusterCaption"=> "ggh",
                    "hintContent"=> $item->adres,
                );
                $arr["features"][] = $elem;
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
        return $apartment->cost;
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
        return $apartment->cost;
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
        return $apartment->size;
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
        return $apartment->size;
    }

}