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
    'component' => [],
    'rules'     => [
        '/realty' => 'realty/realty/index',
    ],
];