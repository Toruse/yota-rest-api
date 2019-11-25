<?php

/**
 * This is the model class for table "desktops".
 *
 * The followings are the available columns in table 'desktops':
 * @property integer $id
 * @property integer $id_region
 * @property string $name
 * @property string $period
 * @property string $time
 * @property string $speed
 * @property double $price
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Regions $idRegion
 */
class Desktops extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'desktops';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, period, time, speed', 'required'),
			array('id_region, active', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name, period, time, speed', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_region, name, period, time, speed, price, active', 'safe', 'on'=>'search'),
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
			'period' => 'Period',
			'time' => 'Time',
			'speed' => 'Speed',
			'price' => 'Price',
			'active' => 'Active',
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
		$criteria->compare('period',$this->period,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('speed',$this->speed,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Desktops the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDataSend($models){
        $rows = array();
        foreach($models as $model) {
            switch ($model->period){
                case 'minimum_options':
                    $rows['minimum_options'][$model->time]=$model->price;
                    break;
                default:
                    $rows[$model->period][$model->speed]=$model->price;
            }
        }
        return $rows;
    }

    public static function getDataAllSend($models){
        $rows = array();
        foreach($models as $model) {
            switch ($model->period){
                case 'minimum_options':
                    $rows[$model->id_region]['minimum_options'][$model->time]=$model->price;
                    break;
                default:
                    $rows[$model->id_region][$model->period][$model->speed]=$model->price;
            }
        }
        return $rows;
    }
}
