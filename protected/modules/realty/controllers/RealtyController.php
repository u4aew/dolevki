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
        $this->render("/building/list",["dataProvider" => $data]);
    }

    public function actionGetBuildingsForMap()
    {
        $arr = Building::model()->findAll();
        echo Yii::app()->realty->getYandexMapJson($arr);
    }


    public function actionSearch()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 't.*';

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

    public function actionView($name)
    {
        $model = Building::model()->find("slug = :slug",[":slug" => $name]);
        $this->render("/building/view",["data" => $model]);
    }


    public function actionViewApartment($id)
    {
        $model = Apartment::model()->findByPk($id);
        $this->render("/apartment/view",["data" => $model]);
    }

}