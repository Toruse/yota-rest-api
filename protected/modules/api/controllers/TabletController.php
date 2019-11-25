<?php

class TabletController extends ApiController
{
    public function actionIndex()
    {
        $region_id=Yii::app()->request->getParam('region_id');
        if ($region_id) {
            $model = Tablets::model()->findByAttributes(array('id_region'=>$region_id,'active'=>1));
            if(empty($model)) {
                $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифный план не найден')),$this->format);
            } else {
                $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Tablets::getDataSend($model))),$this->format);
            }
        }
        else
            $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Не задан параметр для запроса')),$this->format);
    }

}