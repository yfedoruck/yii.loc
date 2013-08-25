<?php

/**
 * This is the model class for table "eav_attribute".
 *
 * The followings are the available columns in table 'eav_attribute':
 * @property integer $attribute_id
 * @property string $attribute_code
 * @property string $frontend_label
 *
 * The followings are the available model relations:
 * @property ProductVarchar[] $productVarchars
 */
class EavAttribute extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EavAttribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eav_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attribute_code, frontend_label', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('attribute_id, attribute_code, frontend_label', 'safe', 'on'=>'search'),
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
			'productVarchars' => array(self::HAS_MANY, 'ProductVarchar', 'attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'attribute_id' => 'Attribute',
			'attribute_code' => 'Attribute Code',
			'frontend_label' => 'Frontend Label',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('attribute_id',$this->attribute_id);
		$criteria->compare('attribute_code',$this->attribute_code,true);
		$criteria->compare('frontend_label',$this->frontend_label,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}