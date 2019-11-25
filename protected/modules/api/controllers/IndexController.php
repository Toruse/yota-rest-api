<?php

class IndexController extends ApiController
{
	public function actionIndex()
    {
        $this->getMessage();
    }

    public function actionSendMessage()
    {
        $this->getMessage();
    }

    private function getMessage()
    {
        $formBody=new FormBody();
        if ($formBody->load($this->getData()) && $formBody->validate()){
            switch ($formBody->type){
                case 'phone':
                    $data=new stdClass();

                    if (isset($formBody->parameters['minutes'])) {
                        $criteria = new CDbCriteria();
                        if ($formBody->region_id) $criteria->compare('id_region',$formBody->region_id);
                        $criteria->compare('minutes',$formBody->parameters['minutes']);
                        $data->minutes = PhoneMinutes::model()->findAll($criteria);
                    }

                    if (isset($formBody->parameters['traffic'])) {
                        $criteria = new CDbCriteria();
                        if ($formBody->region_id) $criteria->compare('id_region',$formBody->region_id);
                        $criteria->compare('traffic',$formBody->parameters['traffic']);
                        $data->traffic = PhoneTraffics::model()->findAll($criteria);
                    }

                    if (
                        isset($formBody->parameters['social_networks'])
                        || isset($formBody->parameters['messengers'])
                        || isset($formBody->parameters['unlimited_sms'])
                    ) {
                        $criteria = new CDbCriteria();
                        if ($formBody->region_id) $criteria->compare('id_region',$formBody->region_id);
                        if (isset($formBody->parameters['unlimited_sms']))
                            $criteria->compare('price_unlimited_sms','>0');
                        $data->options = PhoneOptions::model()->find($criteria);
                        if ($data->options) {
                            if (isset($formBody->parameters['social_networks'])) {
                                if (is_array($formBody->parameters['social_networks']))
                                    $data->options->price_networks = $data->options->price_networks*count($formBody->parameters['social_networks']);
                                else
                                    $data->options->price_networks *= $formBody->parameters['social_networks'];
                            }
                            if (isset($formBody->parameters['messengers'])) {
                                if (is_array($formBody->parameters['messengers']))
                                    $data->options->price_messenger = $data->options->price_messenger*count($formBody->parameters['messengers']);
                                else
                                    $data->options->price_messenger *= $formBody->parameters['messengers'];
                            }
                        }
                    }

                    if(empty($data->minutes) && empty($data->traffic) && empty($data->options)) {
                        $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифные планы не найдены')),$this->format);
                    } else {
                        if (isset($formBody->sender)) (new Sender('phone',$formBody->sender,$data,$formBody->parameters))->send();
                        $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Phones::getDataSend($data))),$this->format);
                    }
                    break;
                case 'tablet':
                    $criteria = new CDbCriteria();
                    if ($formBody->region_id) $criteria->compare('id_region',$formBody->region_id);
                    if (isset($formBody->parameters['day'])) $criteria->compare('day',$formBody->parameters['day']);
                    if (isset($formBody->parameters['month'])) $criteria->compare('month',$formBody->parameters['month']);
                    if (isset($formBody->parameters['year'])) $criteria->compare('year',$formBody->parameters['year']);
                    $criteria->compare('active',1);
                    $models = Tablets::model()->findAll($criteria);
                    if(empty($models)) {
                        $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифные планы не найдены')),$this->format);
                    } else {
                        if (isset($formBody->sender)) (new Sender('tablet',$formBody->sender,$models,$formBody->parameters))->send();
                        $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Tablets::getDataAllSend($models))),$this->format);
                    }
                    break;
                case 'desktop':
                    $criteria = new CDbCriteria();
                    $criteria->select="CASE speed WHEN 'maximum' THEN 2 WHEN 'minimum' THEN 0 ELSE 1 END AS sort, t.*";
                    if ($formBody->region_id) $criteria->compare('id_region',$formBody->region_id);
                    if (isset($formBody->parameters['type'])) {
                        switch ($formBody->parameters['type']){
                            case 'day':
                                $formBody->parameters['type']='minimum_options';
                                break;
                        }
                        $criteria->compare('period', $formBody->parameters['type']);
                    }
                    if (isset($formBody->parameters['speed'])) $criteria->compare('speed',$formBody->parameters['speed']);
                    if (isset($formBody->parameters['time'])) $criteria->compare('time',$formBody->parameters['time']);
                    if (isset($formBody->parameters['price'])) $criteria->compare('price',$formBody->parameters['price']);
                    $criteria->compare('time','<>free');
                    $criteria->compare('active',1);
                    $criteria->order = "period DESC, sort ASC, CAST(speed AS SIGNED) ASC, CAST(time AS SIGNED) ASC";
                    $models = Desktops::model()->findAll($criteria);
                    if(empty($models)) {
                        $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифные планы не найдены')),$this->format);
                    } else {
                        if (isset($formBody->sender)) (new Sender('desktop',$formBody->sender,$models))->send();
                        $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Desktops::getDataAllSend($models))),$this->format);
                    }
                    break;
                default:
                    $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Неверный тип устройства')),$this->format);
            }
            $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>null)),$this->format);
        }
        else {
            $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Неверные параметры')),$this->format);
        }
	}

	private function getData(){
        if (Yii::app()->request->isPostRequest && count($_POST)>0)
            return $_POST;
        elseif (is_array($data=CJSON::decode(file_get_contents('php://input'))) && count($data))
            return $data;
        else
            $this->_sendResponse(200, CJSON::encode(array('error' => 1, 'message' => 'Не задан параметр для запроса')), $this->format);
    }
}