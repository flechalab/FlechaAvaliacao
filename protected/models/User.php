<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $social_flag
 * @property string $social_profile
 * @property string $social_name
 * @property string $social_img
 *
 * The followings are the available model relations:
 * @property Social $socialFlag
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('social_flag, social_profile, social_name', 'required'),
			array('name, social_img', 'length', 'max'=>255),
			array('social_flag, social_profile, social_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, social_flag, social_profile, social_name, social_img', 'safe', 'on'=>'search'),
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
			'social' => array(self::BELONGS_TO, 'Social', 'social_flag'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'social_flag' => 'Social Flag',
			'social_profile' => 'Social Profile',
			'social_name' => 'Social Name',
			'social_img' => 'Social Img',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('social_flag',$this->social_flag,true);
		$criteria->compare('social_profile',$this->social_profile,true);
		$criteria->compare('social_name',$this->social_name,true);
		$criteria->compare('social_img',$this->social_img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}