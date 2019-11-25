<?php

class DesktopController extends ApiController
{
    public function actionIndex()
    {
        $region_id=Yii::app()->request->getParam('region_id');
        if ($region_id) {
            $criteria = new CDbCriteria();
            $criteria->select="CASE speed WHEN 'maximum' THEN 2 WHEN 'minimum' THEN 0 ELSE 1 END AS sort, t.*";
            $criteria->compare('id_region',$region_id);
            $criteria->compare('time','<>free');
            $criteria->compare('active',1);
            $criteria->order = "period DESC, sort ASC, CAST(speed AS SIGNED) ASC, CAST(time AS SIGNED) ASC";
            $models = Desktops::model()->findAll($criteria);
            if(empty($models)) {
                $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Тарифный план не найден')),$this->format);
            } else {
                $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>Desktops::getDataSend($models))),$this->format);
            }
        }
        else
            $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Не задан параметр для запроса')),$this->format);
    }

}