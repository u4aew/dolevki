<?php

/**
 * This is the model class for table "builders".
 *
 * The followings are the available columns in table 'builders':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $link
 * @property string $shortDescription
 *
 *
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords

 */
class Builder extends \yupe\models\YModel
{

    public function getPageTitle()
    {
        return [$this->name, Yii::app()->getModule('yupe')->siteName];
    }

    public function getPageDescription()
    {
        return "На этой странице вы можете просмотреть информацию о застройщике \"{$this->name}\"";
    }

    public function getPageKeywords()
    {
        return "";
    }

    public function getCardTitle()
    {
        return $this->name;
    }



    static public function getForDropdown()
    {
        $dists = Builder::model()->findAll();
        $result = [0 => "------"];
        foreach ($dists as $item)
        {
            $result[$item->id] = $item->name;
        }
        return $result;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'builders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,slug', 'length', 'max'=>100),
            array('image,link', 'length', 'max'=>250),
			array('shortDescription', 'safe'),
            array('seo_title', 'length', 'max'=>100),
            array('seo_description, seo_keywords', 'length', 'max'=>300),
            array('seo_title, seo_description, seo_keywords','safe'),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('image,link, id,slug, name, shortDescription', 'safe', 'on'=>'search'),
		);
	}

    public function behaviors()
    {
        return [
            'imageUpload' => [
                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'image',
                'uploadPath' => 'realty/builders/',
                'resizeOnUpload' => true,
                'resizeOptions' => [
                    'maxWidth' => 700,
                    'maxHeight' => 700,
                ],
            ],
        ];
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
            'link' => 'Ссылка на сайт',
			'shortDescription' => 'Описание',
            'seo_title' => 'Title страницы',
            'seo_description' => 'Description',
            'seo_keywords' => 'Keywords',
            'image' => 'Изображение'
		);
	}

    public function getUrl()
    {
        return "/zastroyschik/".$this->slug;
    }

    public function getOldUrl()
    {
        return "/builder/".$this->slug;
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
		$criteria->compare('shortDescription',$this->shortDescription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Builder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
