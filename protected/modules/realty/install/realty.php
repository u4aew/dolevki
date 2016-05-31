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
        '/realty' => 'realty/realty/index',
        '/search' => 'realty/realty/search',
        '/apartment/view/<id>' => 'realty/realty/viewApartment',
        '/building/view/<name>' => 'realty/realty/viewBuilding',
        '/district/view/<name>' => 'realty/realty/viewDistrict',
        '/builder/view/<name>' => 'realty/realty/viewBuilder',
        '/' => '/realty/realty/index',
        '/<module:\w+>/<controller:\w+>/<action:\w+>' => '/<module>/<controller>/<action>',
    ],

];