<?php

class FormBody extends CFormModel
{
    public $region_id=null;
    public $type=null;
    public $parameters=[];
    public $sender=[];

    public function rules()
    {
        return array(
            array('type, parameters','required'),
            array('region_id','type','type'=>'integer'),
            array('type','type','type'=> 'string'),
            array('parameters, sender','isArray'),
        );
    }

    public function load($data) {
        if (isset($data['region_id']))
            $this->region_id=$data['region_id'];
        if (isset($data['sender']))
            $this->sender=$data['sender'];
        if (isset($data['type']))
            $this->type=$data['type'];
        else
            return false;
        if (isset($data['parameters']))
            $this->parameters=$data['parameters'];
        else
            return false;
        return true;
    }

    public function isArray($attribute,$params)
    {
        if(!is_array($this->$attribute))
            $this->addError($attribute, 'Not array');
    }
}