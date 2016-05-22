<?php
/**
* Класс RealtyImageBackendController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class RealtyImageBackendController extends \yupe\components\controllers\BackController
{
    /**
    * Отображает Изображение по указанному идентификатору
    *
    * @param integer $id Идинтификатор Изображение для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Изображения.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new RealtyImage;

        if (Yii::app()->getRequest()->getPost('RealtyImage') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('RealtyImage'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Изображение добавлено!')
                );

                $redirectLink = "/backend/realty/";
                if ($model->idTable == RealtyImage::$TABLE_BUILDING)
                    $redirectLink.= "building/";
                elseif ($model->idTable == RealtyImage::$TABLE_APARTMENT)
                    $redirectLink.= "apartment/";
                $redirectLink.= "update?id=".$model->idRecord;

                $this->redirect(
                    $redirectLink
                );
            } else
            {
                var_dump($model->getErrors());
            }
        }
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Изображения.
    *
    * @param integer $id Идинтификатор Изображение для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('RealtyImage') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('RealtyImage'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись обновлена!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        [
                            'update',
                            'id' => $model->id
                        ]
                    )
                );
            }
        }
        $this->render('update', ['model' => $model]);
    }
    
    /**
    * Удаляет модель Изображения из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Изображения, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $model->delete();

        Yii::app()->user->setFlash(
            yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
            Yii::t('RealtyModule.realty', 'Изображение удалено!')
        );

        // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            {
                $redirectLink = "/backend/realty/";
                if ($model->idTable == RealtyImage::$TABLE_BUILDING)
                    $redirectLink.= "building/";
                elseif ($model->idTable == RealtyImage::$TABLE_APARTMENT)
                    $redirectLink.= "apartment/";
                $redirectLink.= "update?id=".$model->idRecord;

                $this->redirect(
                    $redirectLink
                );
            }
        }
    }
    
    /**
    * Управление Изображениями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new RealtyImage('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('RealtyImage') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('RealtyImage'));
        $this->render('index', ['model' => $model]);
    }
    
    /**
    * Возвращает модель по указанному идентификатору
    * Если модель не будет найдена - возникнет HTTP-исключение.
    *
    * @param integer идентификатор нужной модели
    *
    * @return void
    */
    public function loadModel($id)
    {
        $model = RealtyImage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('RealtyModule.realty', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
