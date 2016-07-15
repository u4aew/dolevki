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
        $criteria->order = "adres ASC";

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


        $this->title = [Yii::app()->getModule('yupe')->siteName];
        $this->description = "Все новостройки Барнаула, напрямую от застройщиков, без комиссии! Помощь в оформлении документов";
        $this->render("/building/index",["dataProvider" => $data]);
    }

    public function actionNonReady()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->compare("isPublished",1);
        $criteria->compare("status",1);

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


        $this->title = ["Строящиеся дома",Yii::app()->getModule('yupe')->siteName];
        $this->description = "Новостройки, которые скоро будут сданы застройщиками в эксплуатацию, приобретайте по сниженным ценам";
        $this->render("/building/list",["dataProvider" => $data, "title" => "Строящиеся дома", "map" => STATUS_IN_PROGRESS]);
    }

    public function actionReady()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->compare("isPublished",1);
        $criteria->compare("status",2);

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


        $this->title = ["Готовые новостройки",Yii::app()->getModule('yupe')->siteName];
        $this->description = "На этой странице представлены новостройки, которые недавно были сданы застройщиками";
        $this->render("/building/list",["dataProvider" => $data, "title" => "Готовые новостройки", "map" => STATUS_READY]);
    }

    public function actionResell()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->compare("isPublished",1);
        $criteria->compare("status",3);

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


        $this->title = ["Вторичная продажа",Yii::app()->getModule('yupe')->siteName];
        $this->description = "На этой странице представлены жилье, которе продается другими собственниками";
        $this->render("/building/list",["dataProvider" => $data, "title" => "Вторичная продажа", "map" => STATUS_RESELL]);
    }


    public function actionGetBuildingsForIndexMap()
    {
        $criteria = new CDbCriteria();
        $criteria->compare("isShowedOnMap",1);
        $buildings = Building::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare("isPublished",1);
        $districts = District::model()->findAll($criteria);
        $result = array_merge($buildings,$districts);
        echo Yii::app()->realty->getYandexMapJson($result);
    }

    public function actionGetObjectsForMap($map)
    {
        if ($map <= 3)
        {
            $criteria = new CDbCriteria();
            $criteria->compare("isShowedOnMap",1);
            $criteria->compare("status",$map);
            $result = Building::model()->findAll($criteria);
        }
        if ($map == "district")
        {
            $criteria = new CDbCriteria();
            $criteria->compare("isPublished",1);
            $result = District::model()->findAll($criteria);
        }
        echo Yii::app()->realty->getYandexMapJson($result);
    }


    public function actionSearch()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->addCondition("idBuilding <> 0");
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

        $title = "Результаты поиска";
        if ($_GET["page"] > 1)
        {
            $title.= ", страница ".$_GET["page"];
        }
        $this->title = [$title,Yii::app()->getModule('yupe')->siteName];
        $this->description = "Результаты поиска квартир, страница".(isset($_GET["page"])? $_GET["page"] : "1");


        $this->render("/apartment/list",["dataProvider" => $data, "headerText" => "Результаты поиска"]);
    }

    public function actionViewBuilding($name)
    {
        $model = Building::model()->find("slug = :slug",[":slug" => $name]);
//        var_dump($name);
//        return;
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

    public function actionListBuilders()
    {
        $criteria = new CDbCriteria();
        $data = new CActiveDataProvider(
            'Builder',
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
        $this->render("/builder/list",["dataProvider" => $data]);
    }

    public function actionListDistricts()
    {
        $criteria = new CDbCriteria();
        $data = new CActiveDataProvider(
            'District',
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
        $this->render("/district/list",["dataProvider" => $data]);
    }

}