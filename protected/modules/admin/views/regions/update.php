<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','Update').' '.Yii::t('modules_admin','Regions');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','Regions')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
    Yii::t('modules_admin','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Regions'), 'url'=>array('index')),
	array('label'=>Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Regions'), 'url'=>array('create')),
	array('label'=>Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Regions'), 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','Update');?> <?php echo Yii::t('modules_admin','Regions');?> <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>