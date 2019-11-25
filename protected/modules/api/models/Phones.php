<?php

/**
 * This is the model class for table "phones".
 *
 * The followings are the available columns in table 'phones':
 * @property integer $id
 * @property integer $id_region
 * @property string $name
 * @property double $price
 * @property integer $package_volume
 * @property string $launch_date
 * @property string $close_date
 * @property integer $sms
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Regions $idRegion
 */
class Phones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('id_region, package_volume, sms, active, traffic, unlimited_apps', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('launch_date, close_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_region, name, price, package_volume, launch_date, close_date, sms, active, traffic, unlimited_apps', 'safe', 'on'=>'search'),
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
			'id_region' => 'Id Region',
			'name' => 'Name',
			'price' => 'Price',
            'unlimited_SMS' => 'Unlimited SMS',
			'package_volume' => 'Package Volume',
			'launch_date' => 'Launch Date',
			'close_date' => 'Close Date',
			'sms' => 'Sms',
			'active' => 'Active',
            'traffic' => 'Traffic',
            'unlimited_apps'=>'Unlimited Apps',
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
		$criteria->compare('id_region',$this->id_region);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('package_volume',$this->package_volume);
		$criteria->compare('launch_date',$this->launch_date,true);
		$criteria->compare('close_date',$this->close_date,true);
		$criteria->compare('sms',$this->sms);
		$criteria->compare('active',$this->active);
        $criteria->compare('traffic',$this->traffic);
		$criteria->compare('unlimited_apps',$this->unlimited_apps);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDataSend($models) {
        $rows = array();

        if (is_array($models->minutes)) {
            foreach ($models->minutes as $minutes) {
                $rows['minutes'][]=[
                    'minutes' => $minutes->minutes,
                    'price' => $minutes->price,
                ];
            }
        }

        if (is_array($models->traffic)) {
            foreach ($models->traffic as $traffic) {
                $rows['traffic'][]=[
                    'traffic' => $traffic->traffic,
                    'price' => $traffic->price,
                ];
            }
        }

        if ($models->options) {
            $rows['one_social_network_price']=$models->options->price_networks;
            $rows['one_messenger_price']=$models->options->price_messenger;
            $rows['unlimited_sms']=$models->options->price_unlimited_sms;
        }

        return $rows;
    }

    public static function getPrice($data){
	    $price=0;
	    if (isset($data->minutes) && is_array($data->minutes))
	        foreach ($data->minutes as $minute) {
	            $price+=$minute->price;
            }
        if (isset($data->traffic) && is_array($data->traffic))
            foreach ($data->traffic as $traffic) {
                $price+=$traffic->price;
            }
        if (isset($data->options)) {
	        if (isset($data->options->price_networks)) $price+=$data->options->price_networks;
            if (isset($data->options->price_messenger)) $price+=$data->options->price_messenger;
            if (isset($data->options->price_unlimited_sms)) $price+=$data->options->price_unlimited_sms;
        }
	    return $price;
    }
}
