<?php

class PhoneController extends ApiController
{
    public function actionIndex()
    {
        $region_id=Yii::app()->request->getParam('region_id');
        if ($region_id) {
            $data=new stdClass();

            $criteria = new CDbCriteria();
            $criteria->compare('id_region',$region_id);
            $criteria->order = 'minutes, price';
            $data->minutes = PhoneMinutes::model()->findAll($criteria);

            $criteria = new CDbCriteria();
            $criteria->compare('id_region',$region_id);
            $criteria->order = 'traffic, price';
            $data->traffic = PhoneTraffics::model()->findAll($criteria);

            $data->options = PhoneOptions::model()->find('id_region=:id_region', array(':id_region'=>$region_id));

            if(empty($data->minutes) && empty($data->traffic) && empty($data->options)) {
                $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифные планы не найдены')),$this->format);
            } else {
                $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Phones::getDataSend($data))),$this->format);
            }
        }
        else
            $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Не задан параметр для запроса')),$this->format);
    }

}