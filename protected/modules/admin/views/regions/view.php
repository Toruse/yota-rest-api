<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Regions');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','Regions')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Regions'), 'url'=>array('index')),
	array('label'=>Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Regions'), 'url'=>array('create')),
	array('label'=>Yii::t('modules_admin','Update').' '.Yii::t('modules_admin','Regions'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('modules_admin','Delete').' '.Yii::t('modules_admin','Regions'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('modules_admin','Are you sure you want to delete this item?'))),
//	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Regions')?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
