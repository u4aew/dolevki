<?php

/**
 * This is the model class for table "apartments".
 *
 * The followings are the available columns in table 'apartments':
 * @property integer $id
 * @property integer $idBuilding
 * @property integer $floor
 * @property integer $rooms
 * @property integer $size
 * @property integer $cost
 * @property string $image
 * @property string $shortDescription
 * @property string $longDescription

 * @property Building $building

 */
class Apartment extends yupe\models\YModel
{

    public function getPageTitle()
    {
        return $this->getTitle();
    }

    public function getPageDescription()
    {
        return "";
    }

    public function getPageKeywords()
    {
        return "";
    }



    static public function getRoomsArray()
    {
        return [
            -1 => "------",
            "Студия",
            "Однокомнатная",
            "Двухкомнатная",
            "Трехкомнатная",
            "4+Комнантная"
        ];
    }

    public function getPriceAsString()
    {
        return number_format($this->cost,0,","," ").'<span class="rubl"> руб.</span>';
    }


    public function behaviors()
    {
        return [
            'imageUpload' => [
                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'image',
                'uploadPath' => 'realty/apartments/',
                'resizeOnUpload' => true,
                'resizeOptions' => [
                    'maxWidth' => 500,
                    'maxHeight' => 500,
                ],
            ],
        ];
    }

    public function getRoomsAsString()
    {
        return Apartment::getRoomsArray()[$this->rooms];
    }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apartments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idBuilding, floor, rooms, size, cost', 'numerical', 'integerOnly'=>true),
            array('image', 'length', 'max'=>200),
            array('shortDescription, longDescription', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('image, id, idBuilding, floor, rooms, size, cost, shortDescription, longDescription', 'safe', 'on'=>'search'),
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
            'building'=>array(self::BELONGS_TO, 'Building', 'idBuilding'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idBuilding' => 'Id Building',
			'floor' => 'Этаж',
			'rooms' => 'Комнатность',
			'size' => 'Площадь',
			'cost' => 'Стоимость',
			'shortDescription' => 'Короткое описание',
			'longDescription' => 'Длинное описание',
            'image' => 'Изображение',
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
		$criteria->compare('idBuilding',$this->idBuilding);
		$criteria->compare('floor',$this->floor);
		$criteria->compare('rooms',$this->rooms);
		$criteria->compare('size',$this->size);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('shortDescription',$this->shortDescription,true);
		$criteria->compare('longDescription',$this->longDescription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apartment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getUrl()
    {
        return "/apartment/view/".$this->id;
    }
    
    public function getImages()
    {
        $criteria = new CDbCriteria();
        $criteria->compare("idTable",1);
        $criteria->compare("idRecord",$this->id);
        $images = RealtyImage::model()->findAll($criteria);
        return $images;
    }

    public function getTitle()
    {
        return $this->getRoomsAsString()." на ".$this->floor." этаже по адресу ".$this->building->adres;
    }


}
