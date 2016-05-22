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