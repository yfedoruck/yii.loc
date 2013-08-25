<?php

/**
 * This is the model class for table "product_varchar".
 *
 * The followings are the available columns in table 'product_varchar':
 * @property integer $value_id
 * @property integer $attribute_id
 * @property string $entity_id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property Product $entity
 * @property EavAttribute $attribute
 */
class ProductVarchar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductVarchar the static model class
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
		return 'product_varchar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attribute_id', 'numerical', 'integerOnly'=>true),
			array('entity_id', 'length', 'max'=>10),
			array('value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('value_id, attribute_id, entity_id, value', 'safe', 'on'=>'search'),
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
			'entity' => array(self::BELONGS_TO, 'Product', 'entity_id'),
			'attribute' => array(self::BELONGS_TO, 'EavAttribute', 'attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'value_id' => 'Value',
			'attribute_id' => 'Attribute',
			'entity_id' => 'Entity',
			'value' => 'Value',
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

		$criteria->compare('value_id',$this->value_id);
		$criteria->compare('attribute_id',$this->attribute_id);
		$criteria->compare('entity_id',$this->entity_id,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}