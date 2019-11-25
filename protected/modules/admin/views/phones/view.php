<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Tariff');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','For phones')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Tariffs'), 'url'=>array('index')),
	array('label'=>Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Tariff'), 'url'=>array('create')),
	array('label'=>Yii::t('modules_admin','Update').' '.Yii::t('modules_admin','Tariff'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('modules_admin','Delete').' '.Yii::t('modules_admin','Tariff'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('modules_admin','Are you sure you want to delete this item?'))),
//	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Tariff')?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'name'=>'id_region',
            'value'=>function ($model){
                return $model->idRegion->name;
            },
        ),
		'name',
		'price',
		'package_volume',
		'launch_date',
		'close_date',
		'sms',
        'traffic',
        'unlimited_apps',
        array(
            'name'=>'sms_active',
            'value'=>function ($model){
                return ($model->sms_active)?Yii::t('modules_admin','Active'):Yii::t('modules_admin','Not active');
            },
        ),
        array(
            'name'=>'active',
            'value'=>function ($model){
                return Phones::getListStatus()[$model->active];
            },
        ),
	),
)); ?>
