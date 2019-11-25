<?php

class Sender {

    private $pathViews='';
    private $pathLayouts='mail';
    private $sender=null;
    private $models=null;
    private $type=null;
    private $params=null;
    private $title='';

    public function __construct($type,$sender,$models,$params=null){
        $this->type=$type;
        $this->sender=$sender;
        $this->models=$models;
        $this->params=$params;
        $this->setPathView();
    }

    public function send(){
        if ($this->pathViews!='' && isset($this->sender['type']))
        {
            switch ($this->sender['type']){
                case 'phone':
                    $this->sendSms();
                    break;
                case 'email':
                    $this->sendMail();
                    break;
                default:
                    return false;
            }
            return true;
        }
        return false;
    }

    private function setPathView(){
        switch ($this->type){
            case 'phone':
                $this->convertModelsToTplPhone();
                $this->title='Yota для смартфона';
                $this->pathViews='phone';
                break;
            case 'tablet':
                $this->convertModelsToTplTablet();
                $this->pathViews='tablet';
                $this->title='Yota для планшета';
                break;
            case 'desktop':
                $this->pathViews='desktop';
                $this->title='Yota для компьютера';
                break;
        }
    }

    private function sendSms(){
        if (isset(Yii::app()->params['sms']['link']))
            $link=Yii::app()->params['sms']['link'];
        else
            $link='';

        $hash=Links::getHash();

        $criteria = new CDbCriteria();
        $criteria->compare('hash',$hash);
        $model=Links::model()->find($criteria);

        if(empty($model)) {
            $model=new Links();
            $model->hash=$hash;
            $model->url=Yii::app()->getRequest()->getUrl();
            $model->settings=Links::getStrSettings();
            $model->link=Links::getLinkCode();
            $model->save();
        }

        $body=Yii::app()
            ->controller
            ->renderPartial(
                ((isset(Yii::app()->params['sms']['pathViews']))?Yii::app()->params['sms']['pathViews']:'application.views.phone')
                    .'.'.$this->pathViews,
                array(
                    'model'=>$model,
                    'link'=>$link,
                    'phone'=>Yii::app()->params['sms']['phone'],
                    'login'=>Yii::app()->params['sms']['login'],
                    'password'=>Yii::app()->params['sms']['password'],
                    'sendPhone'=>$this->sender['value']
            ), true);
        return $this->_sendSmsGateway($body,Yii::app()->params['sms']['host']);
    }

    private function _sendSmsGateway($body,$href){
        if (!empty($href)) {
            $res='';
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml; charset=utf-8'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CRLF, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_URL, $href);
            $result = curl_exec($ch);
            $res = $result;
            curl_close($ch);
            return $res;
        }
        return false;
    }

    private function sendMail(){
        if (isset($this->sender['value'])) {
            $mailer = Yii::app()->mailer;
            $mailer->IsHTML(true);
//            if (isset(Yii::app()->params['mailer'])){
//                $mailer->IsSMTP();
//                $mailer->Host = Yii::app()->params['mailer']['host'];
//                $mailer->SMTPAuth = Yii::app()->params['mailer']['SMTPAuth'];
//                $mailer->Username = Yii::app()->params['mailer']['username'];
//                $mailer->Password = Yii::app()->params['mailer']['password'];
//                $mailer->SMTPSecure = "ssl";
//                $mailer->Port = '465';
//            }
            $mailer->CharSet = "UTF-8";
            $mailer->Encoding = 'base64';
            $mailer->From = 'noreply@yotateam.com';
            $mailer->FromName = 'Yota';
            $mailer->AddReplyTo('noreply@yotateam.com');
            $mailer->AddAddress($this->sender['value']);
            $mailer->Subject = $this->title;
            $mailer->getView($this->pathViews,array(
                'models'=>$this->models,
                'params'=>$this->params
            ),'main');
//            foreach (glob("images/imgs_mail/sender/*.{jpg,gif,png}",GLOB_BRACE) as $filename) {
//                $mailer->AddEmbeddedImage($filename,'img_'.str_replace('.','_',basename($filename)));
//            }
            return $mailer->Send();
        }
        return false;
    }

    private function convertModelsToTplPhone(){
        $result=[];
//        foreach ($this->models as $model){
//            $result[$model->package_volume]=$model;
//        }
        //$this->models=$result;
        return $this->models;
    }

    private function convertModelsToTplTablet(){
        $rows = array();
        foreach($this->models as $model) {
            $rows=array(
                'day'=>$model->day,
                'month'=>$model->month,
                'year'=>$model->year,
            );
        }
        $this->models=$rows;
        return $this->models;
    }
}