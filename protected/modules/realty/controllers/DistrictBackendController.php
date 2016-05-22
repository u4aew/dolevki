<?php
/**
* Класс DistrictController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class DistrictBackendController extends \yupe\components\controllers\BackController
{
    /**
    * Отображает Квартал по указанному идентификатору
    *
    * @param integer $id Идинтификатор Квартал для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Квартала.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new District;

        if (Yii::app()->getRequest()->getPost('District') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('District'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись добавлена!')
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
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Квартала.
    *
    * @param integer $id Идинтификатор Квартал для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        Yii::app()->user->setState("screenToBack",$this->createUrl("/backend/realty/district/update?id=".$id));
        $buildingModel = new Building('search');
        $buildingModel->unsetAttributes(); // clear any default values
        $buildingModel->idDistrict = $id;
        if (Yii::app()->getRequest()->getParam('Building') !== null)
            $buildingModel->setAttributes(Yii::app()->getRequest()->getParam('Building'));


        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('District') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('District'));

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
        $this->render('update', ['model' => $model, "buildingModel" => $buildingModel]);
    }
    
    /**
    * Удаляет модель Квартала из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Квартала, который нужно удалить
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
    * Управление Кварталами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new District('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('District') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('District'));
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
        $model = District::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('RealtyModule.realty', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
