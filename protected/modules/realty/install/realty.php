<?php
/**
 * Файл настроек для модуля realty
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.realty.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.realty.RealtyModule',
    ],
    'import'    => [],
    'component' => [
        'realty' => [
            'class' => 'application.modules.realty.components.Realty',
        ],
    ],
    'rules'     => [
        '/' => '/realty/realty/index',
        '/realty' => 'realty/realty/index',
        '/poisk' => 'realty/realty/search',
        '/zhilie-kompleksy' => 'realty/realty/listDistricts',
        '/zastroyschiki' => 'realty/realty/listBuilders',
        '/stroyaschiesya-doma' => 'realty/realty/nonReady',
        '/kommercheskaya-nedvigimost' => 'realty/realty/commercial',
        '/novostoyki' => 'realty/realty/ready',
        '/vtorichniy-rinok' => 'realty/realty/resell',
        '/dom/<name>/<id>' => 'realty/realty/viewApartment',
        '/dom/<name>' => 'realty/realty/viewBuilding',
        '/zhiloy-kompleks/<name>' => 'realty/realty/viewDistrict',
        '/zastroyschik/<name>' => 'realty/realty/viewBuilder',
        '/<module:\w+>/<controller:\w+>/<action:\w+>' => '/<module>/<controller>/<action>',
    ],

];