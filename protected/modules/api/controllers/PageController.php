<?php

class PageController extends CController
{
	public function actionIndex($link)
    {
        $this->setPageTitle('Yota');
        $model=Links::model()->findByAttributes(array('link'=>$link));
        if(empty($model)) {
            $this->render('index_error');
        }
        else {
            $settings = json_decode($model->settings, true);
            switch ($settings['type']) {
                case 'phone':
                    $data=new stdClass();
                    $id_region=null;
                    if ($settings['region_id']) $id_region=$settings['region_id'];

                    if (isset($settings['parameters']['minutes'])) {
                        $criteria = new CDbCriteria();
                        if ($id_region) $criteria->compare('id_region',$id_region);
                        $criteria->compare('minutes',$settings['parameters']['minutes']);
                        $data->minutes = PhoneMinutes::model()->findAll($criteria);
                    }

                    if (isset($settings['parameters']['traffic'])) {
                        $criteria = new CDbCriteria();
                        if ($id_region) $criteria->compare('id_region',$id_region);
                        $criteria->compare('traffic',$settings['parameters']['traffic']);
                        $data->traffic = PhoneTraffics::model()->findAll($criteria);
                    }

                    if (
                        isset($settings['parameters']['social_networks'])
                        || isset($settings['parameters']['messengers'])
                        || isset($settings['parameters']['unlimited_sms'])
                    ) {
                        $criteria = new CDbCriteria();
                        if ($id_region) $criteria->compare('id_region',$id_region);
                        if (isset($settings['parameters']['unlimited_sms']))
                            $criteria->compare('price_unlimited_sms','>0');
                        $data->options = PhoneOptions::model()->find($criteria);
                        if ($data->options) {
                            if (isset($settings['parameters']['social_networks'])) {
                                if (!is_array($settings['parameters']['social_networks'])) $settings['parameters']['social_networks']=json_decode($settings['parameters']['social_networks']);
                                if (is_array($settings['parameters']['social_networks']))
                                    $data->options->price_networks = $data->options->price_networks*count($settings['parameters']['social_networks']);
                                else
                                    $data->options->price_networks *= $settings['parameters']['social_networks'];
                            }
                            if (isset($settings['parameters']['messengers'])) {
                                if (!is_array($settings['parameters']['messengers'])) $settings['parameters']['messengers']=json_decode($settings['parameters']['messengers']);
                                if (is_array($settings['parameters']['messengers']))
                                    $data->options->price_messenger = $data->options->price_messenger*count($settings['parameters']['messengers']);
                                else
                                    $data->options->price_messenger *= $settings['parameters']['messengers'];
                            }
                        }
                    }

                    if($id_region) {
                        $this->render('index_phone', array(
                            'models'=>$data,
                            'params'=>$settings['parameters']
                        ));
                    } else {
                        $this->render('index_error');
                    }
                    break;
                case 'tablet':
                    $criteria = new CDbCriteria();
                    if ($settings['region_id']) $criteria->compare('id_region',$settings['region_id']);
                    if (isset($settings['parameters']['day'])) $criteria->compare('day',$settings['parameters']['day']);
                    if (isset($settings['parameters']['month'])) $criteria->compare('month',$settings['parameters']['month']);
                    if (isset($settings['parameters']['year'])) $criteria->compare('year',$settings['parameters']['year']);
                    $criteria->compare('active',1);
                    $models = Tablets::model()->findAll($criteria);
                    if(empty($models)) {
                        $this->render('index_error');
                    } else {
                        $this->render('index_tablet', array(
                            'models'=>$this->convertModelsToTplTablet($models),
                            'params'=>$settings['parameters']
                        ));
                    }
                    break;
                case 'desktop':
                    $criteria = new CDbCriteria();
                    $criteria->select="CASE speed WHEN 'maximum' THEN 2 WHEN 'minimum' THEN 0 ELSE 1 END AS sort, t.*";
                    if ($settings['region_id']) $criteria->compare('id_region',$settings['region_id']);
                    if (isset($settings['parameters']['type'])) {
                        switch ($settings['parameters']['type']){
                            case 'day':
                                $settings['parameters']['type']='minimum_options';
                                break;
                        }
                        $criteria->compare('period', $settings['parameters']['type']);
                    }
                    if (isset($settings['parameters']['speed'])) $criteria->compare('speed',$settings['parameters']['speed']);
                    if (isset($settings['parameters']['time'])) $criteria->compare('time',$settings['parameters']['time']);
                    if (isset($settings['parameters']['price'])) $criteria->compare('price',$settings['parameters']['price']);
                    $criteria->compare('time','<>free');
                    $criteria->compare('active',1);
                    $criteria->order = "period DESC, sort ASC, CAST(speed AS SIGNED) ASC, CAST(time AS SIGNED) ASC";
                    $models = Desktops::model()->findAll($criteria);
                    if(empty($models)) {
                        $this->render('index_error');
                    } else {
                        $this->render('index_desktop', array(
                            'models'=>$models,
                            'params'=>$settings['parameters']
                        ));
                    }
                break;
            }
        }
    }

    private function convertModelsToTplPhone($models){
        $result=[];
        foreach ($models as $model){
            $result[$model->package_volume]=$model;
        }
        return $result;
    }

    private function convertModelsToTplTablet($models){
        $rows = array();
        foreach($models as $model) {
            $rows=array(
                'day'=>$model->day,
                'month'=>$model->month,
                'year'=>$model->year,
            );
        }
        return $rows;
    }
}