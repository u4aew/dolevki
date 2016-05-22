<?php
/**
* Класс BuildingController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class BuildingBackendController extends \yupe\components\controllers\BackController
{
    /**
    * Отображает Дом по указанному идентификатору
    *
    * @param integer $id Идинтификатор Дом для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Дома.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Building;
        $idBuilder = Yii::app()->request->getParam("idBuilder");
        if ($idBuilder != null)
            $model->idBuilder = $idBuilder;

        $idDistrict = Yii::app()->request->getParam("idDistrict");
        if ($idDistrict != null)
            $model->idDistrict = $idDistrict;

        if (Yii::app()->getRequest()->getPost('Building') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Building'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись добавлена!')
                );


                if (Yii::app()->user->getState("screenToBack") != null && Yii::app()->getRequest()->getPost('submit-type') != null)
                {
                    $this->redirect(Yii::app()->user->getState("screenToBack"));
                }
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
    * Редактирование Дома.
    *
    * @param integer $id Идинтификатор Дом для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Building') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Building'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('RealtyModule.realty', 'Запись обновлена!')
                );

                if (Yii::app()->user->getState("screenToBack") != null && Yii::app()->getRequest()->getPost('submit-type') != null)
                {
                    $this->redirect(Yii::app()->user->getState("screenToBack"));
                }
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
    * Удаляет модель Дома из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Дома, который нужно удалить
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
    * Управление Домами.
    *
    * @return void
    */
    public function actionIndex()
    {
        Yii::app()->user->setState("screenToBack",$this->createUrl("/backend/realty/building/index"));
        $model = new Building('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Building') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Building'));
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
        $model = Building::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('RealtyModule.realty', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
