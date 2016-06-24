<?php
/**
 * RealtyController контроллер для realty на публичной части сайта
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.realty.controllers
 * @since 0.1
 *
 */

class RealtyController extends \yupe\components\controllers\FrontController
{
    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->compare("isPublished",1);

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
        $this->render("/building/index",["dataProvider" => $data]);
    }

    public function actionGetBuildingsForMap()
    {
        $buildings = Building::model()->findAll();
        $districts = District::model()->findAll();
        $result = array_merge($buildings,$districts);
        echo Yii::app()->realty->getYandexMapJson($result);
    }


    public function actionSearch()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->with = [
            "building"
        ];
        if (Yii::app()->request->getParam("rooms") != null)
        {
            $rooms = Yii::app()->request->getParam("rooms");
            if (array_search("4",$rooms) !== false)
            {
                $rooms[] = "5";
                $rooms[] = "6";
            }
            $criteria->addInCondition("rooms",$rooms);
        }
        if (Yii::app()->request->getParam("minimalCost") != null)
        {
            $criteria->addCondition("cost >= ".Yii::app()->request->getParam("minimalCost"));
        }
        if (Yii::app()->request->getParam("maximalCost") != null)
        {
            $criteria->addCondition("cost <= ".Yii::app()->request->getParam("maximalCost"));
        }
        if (Yii::app()->request->getParam("minimalSize") != null)
        {
            $criteria->addCondition("size >= ".Yii::app()->request->getParam("minimalSize"));
        }
        if (Yii::app()->request->getParam("maximalSize") != null)
        {
            $criteria->addCondition("size <= ".Yii::app()->request->getParam("maximalSize"));
        }
        if (Yii::app()->request->getParam("status") != null)
        {
            $criteria->addInCondition("building.status",Yii::app()->request->getParam("status"));
        }
        if (Yii::app()->request->getParam("time") != null)
        {
            $criteria->addInCondition("building.readyTime",Yii::app()->request->getParam("time"));
        }

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
        $this->render("/apartment/list",["dataProvider" => $data]);
    }

    public function actionViewBuilding($name)
    {
        $model = Building::model()->find("slug = :slug",[":slug" => $name]);
        $this->render("/building/view",["data" => $model]);
    }

    public function actionViewDistrict($name)
    {
        $model = District::model()->find("slug = :slug",[":slug" => $name]);
        $this->render("/district/view",["data" => $model]);
    }

    public function actionViewBuilder($name)
    {
        $model = Builder::model()->find("slug = :slug",[":slug" => $name]);
        $this->render("/builder/view",["data" => $model]);
    }

    public function actionViewApartment($id)
    {
        $model = Apartment::model()->findByPk($id);
        $this->render("/apartment/view",["data" => $model]);
    }

}