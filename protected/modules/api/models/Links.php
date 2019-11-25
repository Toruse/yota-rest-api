<?php

/**
 * This is the model class for table "links".
 *
 * The followings are the available columns in table 'links':
 * @property integer $id
 * @property string $hash
 * @property string $url
 * @property string $settings
 * @property string $link
 */
class Links extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'links';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hash, url, link', 'required'),
			array('hash', 'length', 'max'=>33),
			array('url, link', 'length', 'max'=>255),
			array('settings', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hash, url, settings, link', 'safe', 'on'=>'search'),
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
			'hash' => 'Hash',
			'url' => 'Url',
			'settings' => 'Settings',
			'link' => 'Link',
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
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('link',$this->link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Links the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getStrSettings(){
        if (Yii::app()->request->isPostRequest && count($_POST)>0) {
            unset($_POST['sender']);
            return CJSON::encode($_POST);
        }
        elseif (is_array($data=CJSON::decode(file_get_contents('php://input'))) && count($data)) {
            unset($data['sender']);
            return CJSON::encode($data);
        }
        else
            return '';
    }

    public static function getLinkCode(){
        $model=null;
        do {
            mt_srand((double)microtime()*10000);
            $charid = md5(uniqid(rand(), true));
            $uuid =substr($charid,0,2)
                .substr($charid,18,2);
            $model=Links::model()->findByAttributes(array('link'=>$uuid));
        } while ($model);
        return $uuid;
    }

    public static function getHash(){
        return md5(Yii::app()->getRequest()->getUrl().self::getStrSettings());
    }
}
