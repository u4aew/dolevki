<?php
/**
* Класс ApartmentBackendController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class ApartmentBackendController extends \yupe\components\controllers\BackController
{


    /**
    * Отображает Квартиру по указанному идентификатору
    *
    * @param integer $id Идинтификатор Квартиру для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Квартиры.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate($idBuilding)
    {
        $model = new Apartment;
        $model->idBuilding = $idBuilding;

        if (Yii::app()->getRequest()->getPost('Apartment') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Apartment'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись добавлена!')
                );

                if (Yii::app()->getRequest()->getPost("submit-type") === null)
                    $this->redirect(
                        $this->createUrl("/backend/realty/building/update?id=".$model->idBuilding)
                    );
                else
                    $this->redirect(
                        $this->createUrl("/backend/realty/apartment/update?id=".$model->id)
                    );
            }
        }
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Квартиры.
    *
    * @param integer $id Идинтификатор Квартиру для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Apartment') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Apartment'));
//            $model->image = Yii::app()->getRequest()->getPost('Apartment')["image"];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись обновлена!')
                );

                if (Yii::app()->getRequest()->getPost("submit-type") === null)
                    $this->redirect(
                        $this->createUrl("/backend/realty/building/update?id=".$model->idBuilding)
                    );
                else
                    $this->redirect(
                        $this->createUrl("/backend/realty/apartment/update?id=".$model->id)
                    );
            }
        }
        $this->render('update', ['model' => $model]);
    }
    
    /**
    * Удаляет модель Квартиры из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Квартиры, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('RealtyModule.realty', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('RealtyModule.realty', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }
    
    /**
    * Управление Квартирами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Apartment('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Apartment') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Apartment'));
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
        $model = Apartment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('RealtyModule.realty', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
