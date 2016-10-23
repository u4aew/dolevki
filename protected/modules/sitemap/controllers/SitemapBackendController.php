<?php

use yupe\components\controllers\BackController;
use yupe\widgets\YFlashMessages;

class SitemapBackendController extends BackController
{
    public function accessRules()
    {
        return [
            ['allow', 'roles' => ['admin']],
            ['allow', 'roles' => ['SitemapModule.SitemapBackend.manage']],
            ['deny']
        ];
    }

    public function actions()
    {
        return [
            'inlineModel' => [
                'class' => 'yupe\components\actions\YInLineEditAction',
                'model' => 'SitemapModel',
                'validAttributes' => ['changefreq', 'priority', 'status'],
            ],
            'inlinePage' => [
                'class' => 'yupe\components\actions\YInLineEditAction',
                'model' => 'SitemapPage',
                'validAttributes' => ['url', 'changefreq', 'priority', 'status'],
            ]
        ];
    }

    public function actionSettings()
    {
        $sitemapPage = new SitemapPage('search');
        $sitemapPage->unsetAttributes();
        $sitemapPage->setAttributes(Yii::app()->getRequest()->getParam('SitemapPage', []));
        $this->render('settings', ['sitemapPage' => $sitemapPage]);
    }

    public function actionCreatePage()
    {
        if ($data = Yii::app()->getRequest()->getPost('SitemapPage')) {
            $model = new SitemapPage();
            $model->setAttributes($data);
            $model->save();
        }
        $this->redirect(['settings']);
    }

    public function actionClear()
    {
        SitemapPage::model()->deleteAll();
    }

    public function actionRegenerate()
    {
        if(!Yii::app()->getRequest()->getIsPostRequest() || !Yii::app()->getRequest()->getPost('do')) {
            throw new CHttpException(404);
        }



        $criteria = new CDbCriteria();
        $criteria->select = 't.*';
        $criteria->with = [
            'building' => [
                'condition' => 'building.isPublished = 1',
            ]
        ];

        Yii::import("application.modules.realty.models.*");

        $apartments = new CActiveDataProvider(Apartment,["criteria" => $criteria]);
        foreach (new CDataProviderIterator($apartments) as $item)
        {
            $page = new SitemapPage();
            $page->changefreq = "monthly";
            $page->url = $item->getUrl();
            $page->priority = "0.1";
            $page->status = SitemapPage::STATUS_ACTIVE;
            $page->save();
        }

        $criteria = new CDbCriteria();
        $criteria->compare("isPublished",1);


        $buildings = new CActiveDataProvider(Building,["criteria" => $criteria]);
        foreach (new CDataProviderIterator($buildings) as $item)
        {
            $page = new SitemapPage();
            $page->changefreq = "monthly";
            $page->url = $item->getUrl();
            $page->priority = "0.1";
            $page->status = SitemapPage::STATUS_ACTIVE;
            $page->save();
        }

        $criteria = new CDbCriteria();
        $districts = new CActiveDataProvider(District,["criteria" => $criteria]);
        foreach (new CDataProviderIterator($districts) as $item)
        {
            $page = new SitemapPage();
            $page->changefreq = "monthly";
            $page->url = $item->getUrl();
            $page->priority = "0.1";
            $page->status = SitemapPage::STATUS_ACTIVE;
            $page->save();
        }

        $criteria = new CDbCriteria();
        $builders = new CActiveDataProvider(Builder,["criteria" => $criteria]);
        foreach (new CDataProviderIterator($builders) as $item)
        {
            $page = new SitemapPage();
            $page->changefreq = "monthly";
            $page->url = $item->getUrl();
            $page->priority = "0.1";
            $page->status = SitemapPage::STATUS_ACTIVE;
            $page->save();
        }

        if(\yupe\helpers\YFile::rmIfExists($this->getModule()->getSiteMapPath())){
            Yii::app()->getUser()->setFlash(YFlashMessages::SUCCESS_MESSAGE, Yii::t('SitemapModule.sitemap', 'Sitemap is deleted!'));
            Yii::app()->ajax->success();
        }

        Yii::app()->getUser()->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('SitemapModule.sitemap', 'Sitemap is not deleted!'));
        Yii::app()->ajax->failure();
    }
}
