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
        $criteria->addCondition("status <> 3");
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
        $this->description = "Новостройки, которые скоро будут сданы застройщиками в эксплуатацию, покупайте по ценам застройщиков без комиссий";
        $this->render("/building/list",["dataProvider" => $data, "title" => "Строящиеся дома", "map" => STATUS_IN_PROGRESS]);
    }

    public function actionReady()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->with = [
            'building' => [
                'condition' => 'building.isPublished = 1 AND building.status = 2',
            ]
        ];
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


        $this->title = ["Квартиры в готовых новостройках",Yii::app()->getModule('yupe')->siteName];
        $this->description = "На этой странице представлены новостройки, которые недавно были сданы застройщиками";
        $this->render("/apartment/big-list", ["dataProvider" => $data, "itemPath" => "_item_for_building", "headerText" => "Квартиры в готовых новостройках", "map" => 2]);
    }

    public function actionResell()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->with = [
            'building' => [
                'condition' => 'building.isPublished = 1 AND building.status = 3',
            ]
        ];
//        $criteria->compare("isPublished",1);
//        $criteria->compare("status",3);

        $apartments = Apartment::model()->findAll($criteria);

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


        $this->title = ["Вторичный рынок",Yii::app()->getModule('yupe')->siteName];
        $this->description = "На этой странице вы можете купить вторичное жилье в Барнауле";
        $this->render("/apartment/big-list", ["dataProvider" => $data, "itemPath" => "_item_for_building", "headerText" => "Вторичный рынок", "map" => 3]);
    }


    public function actionGetBuildingsForIndexMap()
    {
        $criteria = new CDbCriteria();
        $criteria->compare("isShowedOnMap",1);
        $criteria->addCondition("status <> 3");
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
            "building" => [
                "condition" => "building.isPublished = 1",
            ]
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
        if ($model == null || !$model->isPublished)
            throw new CHttpException(404, 'К сожалению, данные об этом доме были удалены с сайта. Но у нас есть много других отличных предложений');

        $this->render("/building/view",["data" => $model]);
    }

    public function actionViewDistrict($name)
    {
        $model = District::model()->find("slug = :slug",[":slug" => $name]);
        if ($model == null)
            throw new CHttpException(404, 'К сожалению, данные об этом квартале были удалены с сайта. Но у нас есть много других отличных предложений');
        $this->render("/district/view",["data" => $model]);
    }

    public function actionViewBuilder($name)
    {
        $model = Builder::model()->find("slug = :slug",[":slug" => $name]);
        if ($model == null)
            throw new CHttpException(404, 'К сожалению, данные об этом застройщике были удалены с сайта. Но у нас есть много других отличных предложений');
        $this->render("/builder/view",["data" => $model]);
    }

    public function actionViewApartment($id)
    {
        $model = Apartment::model()->findByPk($id);
        if ($model == null || $model->building == null || !$model->building->isPublished)
            throw new CHttpException(404, 'К сожалению, данные об этой квартире были удалены с сайта. Но у нас есть много других отличных предложений');
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
        $this->title = ["Застройщики",Yii::app()->getModule('yupe')->siteName];
        $this->description = "Список застройщиков Барнаула с их предложениями";
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
        $this->title = ["Жилые комплексы",Yii::app()->getModule('yupe')->siteName];
        $this->description = "Список строящихся жилых комплексов Барнаула, сроки сдачи, цены";
        $this->render("/district/list",["dataProvider" => $data]);
    }

}