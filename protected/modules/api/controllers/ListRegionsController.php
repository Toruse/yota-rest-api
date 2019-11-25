<?php

class ListRegionsController extends ApiController
{
    public function actionIndex()
    {
        $id=Yii::app()->request->getParam('id');
        if ($id) {
            $model=Regions::model()->findByPk($id);
            if(empty($model)) {
                $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Регион не найден')),$this->format);
            } else {
                $row[$model->id] = $model->name;
                $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>$row)),$this->format);
            }
        }
        else
        {
            $models = Regions::model()->findAll();
            if(empty($models)) {
                $this->_sendResponse(200, CJSON::encode(array('error'=>1,'message'=>'Регионы не найдены')),$this->format);
            } else {
                $rows = array();
                foreach($models as $model)
                    $rows[$model->id] = $model->name;
                $this->_sendResponse(200, CJSON::encode(array('error'=>0,'result'=>$rows)),$this->format);
            }
        }
    }

}