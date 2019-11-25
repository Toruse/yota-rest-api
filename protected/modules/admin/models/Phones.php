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
 * @property integer $sms_active
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Regions $idRegion
 */
class Phones extends CActiveRecord
{
    public static $listStatus=[];

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phones';
	}

    public static function getListStatus(){
        self::$listStatus=[
            1=>Yii::t('modules_admin','Actual'),
            2=>Yii::t('modules_admin','Archive current'),
            0=>Yii::t('modules_admin','Archival'),
        ];
        return self::$listStatus;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name', 'required'),
			array('id_region, package_volume, sms, sms_active, active, traffic, unlimited_apps', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('launch_date, close_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_region, name, price, package_volume, launch_date, close_date, sms, sms_active, active, traffic, unlimited_apps', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('modules_admin','ID'),
			'id_region' => Yii::t('modules_admin','Region'),
			'name' => Yii::t('modules_admin','Name'),
			'price' => Yii::t('modules_admin','Price'),
			'package_volume' => Yii::t('modules_admin','Package Volume'),
			'launch_date' => Yii::t('modules_admin','Launch Date'),
			'close_date' => Yii::t('modules_admin','Close Date'),
			'sms' => Yii::t('modules_admin','Sms'),
			'sms_active' => Yii::t('modules_admin','Sms Active'),
			'active' => Yii::t('modules_admin','Active'),
            'traffic' => Yii::t('modules_admin','Traffic'),
            'unlimited_apps'=>Yii::t('modules_admin','Unlimited Apps'),
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
		$criteria->compare('sms_active',$this->sms_active);
		$criteria->compare('active',$this->active);
        $criteria->compare('traffic',$this->traffic);
        $criteria->compare('unlimited_apps',$this->unlimited_apps);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 50,
            )
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

	public function afterFind(){
        $this->close_date=date('d.m.Y',strtotime($this->close_date));
        $this->launch_date=date('d.m.Y',strtotime($this->launch_date));
    }

    public function beforeSave(){
        if(parent::beforeSave()){
            $this->close_date=date('Y-m-d H:m:s',strtotime($this->close_date));
            $this->launch_date=date('Y-m-d H:m:s',strtotime($this->launch_date));
            return true;

        }else{
            return false;

        }
    }
}
