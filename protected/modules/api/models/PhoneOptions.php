<?php

/**
 * This is the model class for table "phone_options".
 *
 * The followings are the available columns in table 'phone_options':
 * @property string $id
 * @property string $id_filial
 * @property integer $id_region
 * @property double $price_networks
 * @property double $price_messenger
 * @property double $price_unlimited_sms
 *
 * The followings are the available model relations:
 * @property Filials $idFilial
 * @property Regions $idRegion
 */
class PhoneOptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phone_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price_networks, price_messenger, price_unlimited_sms', 'required'),
			array('id_region', 'numerical', 'integerOnly'=>true),
			array('price_networks, price_messenger, price_unlimited_sms', 'numerical'),
			array('id_filial', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_filial, id_region, price_networks, price_messenger, price_unlimited_sms', 'safe', 'on'=>'search'),
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
			'idFilial' => array(self::BELONGS_TO, 'Filials', 'id_filial'),
			'idRegion' => array(self::BELONGS_TO, 'Regions', 'id_region'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_filial' => 'Id Filial',
			'id_region' => 'Id Region',
			'price_networks' => 'Price Networks',
			'price_messenger' => 'Price Messenger',
			'price_unlimited_sms' => 'Price Unlimited Sms',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_filial',$this->id_filial,true);
		$criteria->compare('id_region',$this->id_region);
		$criteria->compare('price_networks',$this->price_networks);
		$criteria->compare('price_messenger',$this->price_messenger);
		$criteria->compare('price_unlimited_sms',$this->price_unlimited_sms);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PhoneOptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
