<?php

/**
 * This is the model class for table "tablets".
 *
 * The followings are the available columns in table 'tablets':
 * @property integer $id
 * @property integer $id_region
 * @property string $name
 * @property double $day
 * @property double $month
 * @property double $year
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Regions $idRegion
 */
class Tablets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tablets';
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
			array('id_region, active', 'numerical', 'integerOnly'=>true),
			array('day, month, year', 'numerical'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_region, name, day, month, year, active', 'safe', 'on'=>'search'),
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
			'day' => Yii::t('modules_admin','Day'),
			'month' => Yii::t('modules_admin','Month'),
			'year' => Yii::t('modules_admin','Year'),
			'active' => Yii::t('modules_admin','Active'),
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
		$criteria->compare('day',$this->day);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('active',$this->active);

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
	 * @return Tablets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
