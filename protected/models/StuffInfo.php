<?php

/**
 * This is the model class for table "stuff_info".
 *
 * The followings are the available columns in table 'stuff_info':
 * @property integer $id
 * @property integer $stuff_id
 * @property integer $info_id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property Info $info
 * @property Stuff $stuff
 */
class StuffInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StuffInfo the static model class
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
		return 'stuff_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stuff_id, info_id', 'required'),
			array('stuff_id, info_id', 'numerical', 'integerOnly'=>true),
			array('value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, stuff_id, info_id, value', 'safe', 'on'=>'search'),
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
			'info' => array(self::BELONGS_TO, 'Info', 'info_id'),
			'stuff' => array(self::BELONGS_TO, 'Stuff', 'stuff_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stuff_id' => 'Stuff',
			'info_id' => 'Info',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('stuff_id',$this->stuff_id);
		$criteria->compare('info_id',$this->info_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}