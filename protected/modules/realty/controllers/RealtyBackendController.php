<?php
/**
* RealtyBackendController контроллер для realty в панели управления
*
* @author yupe team <team@yupe.ru>
* @link http://yupe.ru
* @copyright 2009-2016 amyLabs && Yupe! team
* @package yupe.modules.realty.controllers
* @since 0.1
*
*/

class RealtyBackendController extends \yupe\components\controllers\BackController
{
    public function actionGenerateSeoTags()
    {
        $classes = ["Apartment","Building","Builder","District"];
        foreach ($classes as $className)
        {
            $models = $className::model()->findAll();
            foreach ($models as $model)
            {
                $model->seo_title = $model->getPageTitle()[0];
                $model->seo_description = $model->getPageDescription();
                $model->seo_keywords = $model->getPageKeywords();
                if (!$model->save())
                    var_dump($model->getErrors());
            }
        }

    }

    public function actionGetRedirectList()
    {
        $classes = ["Apartment","Building","Builder","District"];
        foreach ($classes as $className)
        {
            $models = $className::model()->findAll();
            foreach ($models as $model)
            {
                echo "Redirect 301 ";
                echo $model->getOldUrl();
                echo " http://{url-dlya-avtozameny}";
                echo $model->getUrl();
                echo "<br>";
            }
        }
    }


    public function actionClearDescriptions()
    {
        $classes = ["Apartment","Building","Builder","District"];
        foreach ($classes as $className)
        {
            $models = $className::model()->findAll();
            foreach ($models as $model)
            {
                $model->shortDescription = strip_tags($model->shortDescription);
                $model->save();
            }
        }
        $classes = ["Apartment","Building","District"];
        foreach ($classes as $className)
        {
            $models = $className::model()->findAll();
            foreach ($models as $model)
            {
                $model->longDescription = strip_tags($model->longDescription);
                $model->save();
            }
        }

    }
    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
		$this->render('index');
	}
}