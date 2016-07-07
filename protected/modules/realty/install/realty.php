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
        '/search' => 'realty/realty/search',
        '/districts' => 'realty/realty/listDistricts',
        '/builders' => 'realty/realty/listBuilders',
        '/nonReady' => 'realty/realty/nonReady',
        '/ready' => 'realty/realty/ready',
        '/resell' => 'realty/realty/resell',
        '/building/<name>/<id>' => 'realty/realty/viewApartment',
        '/building/<name>' => 'realty/realty/viewBuilding',
        '/district/<name>' => 'realty/realty/viewDistrict',
        '/builder/<name>' => 'realty/realty/viewBuilder',
        '/<module:\w+>/<controller:\w+>/<action:\w+>' => '/<module>/<controller>/<action>',
    ],

];