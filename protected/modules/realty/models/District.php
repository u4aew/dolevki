<?php

/**
 * This is the model class for table "districts".
 *
 * The followings are the available columns in table 'districts':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $icon
 * @property string $longitude
 * @property string $latitude
 * @property string $shortDescription
 * @property string $longDescription
 * @property integer $isPublished
 *
 *
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords

 */
define("MAP_ICON_SIZE", 21);
class District extends yupe\models\YModel
{

    public function getPageTitle()
    {
        return [$this->name, Yii::app()->getModule('yupe')->siteName];
    }

    public function getPageDescription()
    {
        return "\"{$this->name}\" - Вся информация о сроках сдачи, домах, ценах";
    }

    public function getPageKeywords()
    {
        return "";
    }

    public function getCardTitle()
    {
        return $this->name;
    }



    public function getMapInfo()
    {
        $elem = array();
        $elem["type"] = "Feature";
        $elem["id"] = $this->id+1000;
        $elem["geometry"] = array(
            "type" => "Point",
            "coordinates" => array($this->latitude,$this->longitude)
        );
        $elem["options"] = array(
            "iconLayout" =>  'default#image',
            // Своё изображение иконки метки.
            "iconImageHref" => "https://sandbox.api.maps.yandex.net/examples/ru/2.1/icon_customImage/images/myIcon.gif",
            "iconImageHref" => $this->getImageUrl(MAP_ICON_SIZE,MAP_ICON_SIZE),
            // Размеры метки.
            "iconImageSize" => array(MAP_ICON_SIZE,MAP_ICON_SIZE),
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
//            "iconImageOffset" => [-MAP_ICON_SIZE/2,-MAP_ICON_SIZE/2]
        );
        $elem["properties"] = array(
            "balloonContent" => $this->shortDescription.Yii::app()->realty->getLinkOnMe($this),
//                "clusterCaption"=> "ggh",
            "hintContent"=> $this->name,
        );
        return $elem;
    }

    public function getUrl()
    {
        return "/zhiloy-kompleks/".$this->slug;
    }


    public function getOldUrl()
    {
        return "/district/".$this->slug;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'districts';
    }

    static public function getForDropdown()
    {
        $dists = District::model()->findAll();
        $result = [0 => "------"];
        foreach ($dists as $item)
        {
            $result[$item->id] = $item->name;
        }
        return $result;
    }

    public function behaviors()
    {

        return [
            'imageUpload' => [
                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'icon',
                'uploadPath' => 'realty/districts/',
                'resizeOnUpload' => true,
                'resizeOptions' => [
                    'maxWidth' => 700,
                    'maxHeight' => 700,
                ],
            ],
        ];
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('isPublished', 'numerical', 'integerOnly'=>true),
            array('name,slug', 'length', 'max'=>100),
            array('icon', 'length', 'max'=>255),
            array('longitude, latitude', 'length', 'max'=>14),
            array('shortDescription, longDescription', 'safe'),
            array('seo_title', 'length', 'max'=>100),
            array('seo_description, seo_keywords', 'length', 'max'=>300),
            array('seo_title, seo_description, seo_keywords','safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id,slug, name, icon, longitude, latitude, shortDescription, longDescription, isPublished', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'icon' => 'Иконка',
            'longitude' => 'Долгота',
            'latitude' => 'Широта',
            'shortDescription' => 'Короткое описание',
            'longDescription' => 'Длинное описание',
            'seo_title' => 'Title страницы',
            'seo_description' => 'Description',
            'seo_keywords' => 'Keywords',
            'isPublished' => 'Публиковать на сайте',
        );
    }


    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('icon',$this->icon,true);
        $criteria->compare('longitude',$this->longitude,true);
        $criteria->compare('latitude',$this->latitude,true);
        $criteria->compare('shortDescription',$this->shortDescription,true);
        $criteria->compare('longDescription',$this->longDescription,true);
        $criteria->compare('isPublished',$this->isPublished);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return District the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
