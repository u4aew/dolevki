<?php

/**
 * This is the model class for table "realtypages".
 *
 * The followings are the available columns in table 'realtypages':
 * @property integer $id
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $h1
 * @property integer $type
 * @property string $upper_text
 * @property string $down_text
 */

define("REALTY_PAGE_DISTRICTS",1);
define("REALTY_PAGE_BUILDERS",2);
define("REALTY_PAGE_READY",3);
define("REALTY_PAGE_NON_READY",4);
define("REALTY_PAGE_RESELL",5);
define("REALTY_PAGE_MAIN",6);
define("REALTY_PAGE_COMMERCIAL",7);

class RealtyPage extends \yupe\models\YModel
{

    public function getTypes()
    {
        return [REALTY_PAGE_BUILDERS => "Застройщики", REALTY_PAGE_DISTRICTS => "Жилые кварталы", REALTY_PAGE_NON_READY => "Строящиеся", REALTY_PAGE_READY => "Готовые", REALTY_PAGE_RESELL => "Вторичка", REALTY_PAGE_MAIN => "Главная", REALTY_PAGE_COMMERCIAL => "Коммерческое"];
    }

    public function getTypeAsString()
    {
        $res = $this->getTypes();
        return isset($res[$this->type]) ? $res[$this->type] : "---";
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'realtyPages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('seo_title, h1', 'length', 'max'=>255),
			array('seo_description, seo_keywords, upper_text, down_text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, seo_title, seo_description, seo_keywords, h1, type, upper_text, down_text', 'safe', 'on'=>'search'),
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
			'seo_title' => 'Title',
			'seo_description' => 'Description',
			'seo_keywords' => 'Keywords',
			'h1' => 'H1',
			'type' => 'Тип страницы',
			'upper_text' => 'Верхний текст',
			'down_text' => 'Нижний текст',
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
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('upper_text',$this->upper_text,true);
		$criteria->compare('down_text',$this->down_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RealtyPage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
