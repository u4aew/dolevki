<?php
/**
 * RealtyModule основной класс модуля realty
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.realty
 * @since 0.1
 */

class RealtyModule  extends yupe\components\WebModule
{
    const VERSION = '0.9.8';



    public function addCardTags($model)
    {
        Yii::app()->clientScript->registerMetaTag($model->seo_title,null,null,["itemprop" => "name"]);
        Yii::app()->clientScript->registerMetaTag($model->seo_description,null,null,["itemprop" => "description"]);
        Yii::app()->clientScript->registerMetaTag($model->getImageUrl(200,200,false),null,null,["itemprop" => "image"]);


        Yii::app()->clientScript->registerMetaTag($model->seo_title,null,null,["property" => "og:title"]);
        Yii::app()->clientScript->registerMetaTag("article",null,null,["property" => "og:type"]);
        Yii::app()->clientScript->registerMetaTag("Ладом",null,null,["property" => "og:site_name"]);
        Yii::app()->clientScript->registerMetaTag($model->seo_description,null,null,["property" => "og:description"]);
        Yii::app()->clientScript->registerMetaTag($model->getImageUrl(200,200,false),null,null,["property" => "og:image"]);

        Yii::app()->clientScript->registerMetaTag("summary_large_image",null,null,["property" => "twitter:card"]);
        Yii::app()->clientScript->registerMetaTag("Ладом",null,null,["property" => "twitter:site"]);
        Yii::app()->clientScript->registerMetaTag($model->seo_title,null,null,["property" => "twitter:title"]);
        Yii::app()->clientScript->registerMetaTag($model->getImageUrl(200,200,false),null,null,["property" => "twitter:image"]);
        Yii::app()->clientScript->registerMetaTag("",null,null,["property" => "twitter:image:alt"]);

    }


    /**
     * @var string
     */
    public $phone;

    public function getPhoneForLink()
    {
        $result = str_replace("-","",$this->phone);
        $result = str_replace(" ","",$result);
        if ($result[0] == "8")
        {
            $result = "+7".substr($result,1);
        }
        return $result;
    }

    /**
     * @var string
     */
    public $adres;


    /**
     * @var string
     */
    public $uploadPath = 'realty';
    /**
     * @var string
     */
    public $allowedExtensions = 'jpg,jpeg,png,gif';
    /**
     * @var int
     */
    public $minSize = 0;
    /**
     * @var
     */
    public $maxSize;
    /**
     * @var int
     */
    public $maxFiles = 1;

    public $itemsPerPage;

    /**
     * Массив с именами модулей, от которых зависит работа данного модуля
     *
     * @return array
     */
    public function getDependencies()
    {
        return parent::getDependencies();
    }

    /**
     * Работоспособность модуля может зависеть от разных факторов: версия php, версия Yii, наличие определенных модулей и т.д.
     * В этом методе необходимо выполнить все проверки.
     *
     * @return array или false
     */
    public function checkSelf()
    {
        return parent::checkSelf();
    }

    /**
     * Каждый модуль должен принадлежать одной категории, именно по категориям делятся модули в панели управления
     *
     * @return string
     */
    public function getCategory()
    {
        return Yii::t('RealtyModule.realty', 'Realty');
    }

    /**
     * массив лейблов для параметров (свойств) модуля. Используется на странице настроек модуля в панели управления.
     *
     * @return array
     */
    public function getParamsLabels()
    {
        return [
            "itemsPerPage" => "Кол-во элементов на странице",
            "phone" => "Номер телефона",
            "adres" => "Адрес",
            "itemsPerPage" => "Элементов на странице",
            "uploadPath" => "Путь для загрузки изображений",
            "editor" => "Используемый визуальный редактор"

        ];
    }

    /**
     * массив параметров модуля, которые можно редактировать через панель управления (GUI)
     *
     * @return array
     */
    public function getEditableParams()
    {
        return [
            'phone',
            'adres',
            'itemsPerPage',
            'uploadPath',
            'editor' => Yii::app()->getModule('yupe')->editors,
        ];

    }


    /**
     * @return bool
     */
    public function getInstall()
    {
        if (parent::getInstall()) {
            @mkdir($this->uploadPath, 0755);
        }

        return true;
    }


    /**
     * массив групп параметров модуля, для группировки параметров на странице настроек
     *
     * @return array
     */
    public function getEditableParamsGroups()
    {
        return parent::getEditableParamsGroups();
    }

    /**
     * если модуль должен добавить несколько ссылок в панель управления - укажите массив
     *
     * @return array
     */
    public function getNavigation()
    {
        return [
            [
                'icon' => 'fa fa-fw fa-map-o',
                'label' => Yii::t('RealtyModule.realty', 'Districts'),
                'url' => ['/backend/realty/district/index'],
                'items' => [
                    [
                        'icon' => 'fa fa-fw fa-list-alt',
                        'label' => Yii::t('RealtyModule.realty', 'Districts list'),
                        'url' => ['/backend/realty/district/index'],
                    ],
                    [
                        'icon' => 'fa fa-fw fa-plus-square',
                        'label' => Yii::t('RealtyModule.realty', 'Create district'),
                        'url' => ['/backend/realty/district/create'],
                    ],
                ],
            ],
            [
                'icon' => 'fa fa-fw fa-male',
                'label' => Yii::t('RealtyModule.realty', 'Builders'),
                'url' => ['/backend/realty/builder/index'],
                'items' => [
                    [
                        'icon' => 'fa fa-fw fa-list-alt',
                        'label' => Yii::t('RealtyModule.realty', 'Builders list'),
                        'url' => ['/backend/realty/builder/index'],
                    ],
                    [
                        'icon' => 'fa fa-fw fa-plus-square',
                        'label' => Yii::t('RealtyModule.realty', 'Create builder'),
                        'url' => ['/backend/realty/builder/create'],
                    ],
                ],
            ],
            [
                'icon' => 'fa fa-fw fa-calendar',
                'label' => Yii::t('RealtyModule.realty', 'ReadyTimes'),
                'url' => ['/backend/realty/readyTime/index'],
                'items' => [
                    [
                        'icon' => 'fa fa-fw fa-list-alt',
                        'label' => Yii::t('RealtyModule.realty', 'ReadyTimes list'),
                        'url' => ['/backend/realty/readyTime/index'],
                    ],
                    [
                        'icon' => 'fa fa-fw fa-plus-square',
                        'label' => Yii::t('RealtyModule.realty', 'Create readyTime'),
                        'url' => ['/backend/realty/readyTime/create'],
                    ],
                ],
            ],
            [
                'icon' => 'fa fa-fw fa-page',
                'label' => Yii::t('RealtyModule.realty', 'Страницы'),
                'url' => ['/backend/realty/realtyPage/index'],
            ],
            [
                'icon' => 'fa fa-fw fa-home',
                'label' => Yii::t('RealtyModule.realty', 'Buildings'),
                'url' => ['/backend/realty/building/index'],
                'items' => [
                    [
                        'icon' => 'fa fa-fw fa-list-alt',
                        'label' => Yii::t('RealtyModule.realty', 'Buildings list'),
                        'url' => ['/backend/realty/building/index'],
                    ],
                    [
                        'icon' => 'fa fa-fw fa-plus-square',
                        'label' => Yii::t('RealtyModule.realty', 'Create building'),
                        'url' => ['/backend/realty/building/create'],
                    ],
                ],
            ],
        ];
    }

    /**
     * текущая версия модуля
     *
     * @return string
     */
    public function getVersion()
    {
        return Yii::t('RealtyModule.realty', self::VERSION);
    }

    /**
     * веб-сайт разработчика модуля или страничка самого модуля
     *
     * @return string
     */
    public function getUrl()
    {
        return Yii::t('RealtyModule.realty', 'http://yupe.ru');
    }

    /**
     * Возвращает название модуля
     *
     * @return string.
     */
    public function getName()
    {
        return Yii::t('RealtyModule.realty', 'realty');
    }

    /**
     * Возвращает описание модуля
     *
     * @return string.
     */
    public function getDescription()
    {
        return Yii::t('RealtyModule.realty', 'Описание модуля "realty"');
    }

    /**
     * Имя автора модуля
     *
     * @return string
     */
    public function getAuthor()
    {
        return Yii::t('RealtyModule.realty', 'yupe team');
    }

    /**
     * Контактный email автора модуля
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return Yii::t('RealtyModule.realty', 'team@yupe.ru');
    }

    /**
     * Ссылка, которая будет отображена в панели управления
     * Как правило, ведет на страничку для администрирования модуля
     *
     * @return string
     */
    public function getAdminPageLink()
    {
        return '/realty/realtyBackend/index';
    }

    /**
     * Название иконки для меню админки, например 'user'
     *
     * @return string
     */
    public function getIcon()
    {
        return "fa fa-fw fa-home";
    }

    /**
     * Возвращаем статус, устанавливать ли галку для установки модуля в инсталяторе по умолчанию:
     *
     * @return bool
     **/
    public function getIsInstallDefault()
    {
        return parent::getIsInstallDefault();
    }

    /**
     * Инициализация модуля, считывание настроек из базы данных и их кэширование
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $this->setImport(
            [
                'realty.models.*',
                'realty.components.*',
            ]
        );
    }

    /**
     * Массив правил модуля
     * @return array
     */
    public function getAuthItems()
    {
        return [
            [
                'name' => 'Realty.RealtyManager',
                'description' => Yii::t('RealtyModule.realty', 'Manage realty'),
                'type' => AuthItem::TYPE_TASK,
                'items' => [
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Realty.RealtyBackend.Index',
                        'description' => Yii::t('RealtyModule.realty', 'Index')
                    ],
                ]
            ]
        ];
    }
}
