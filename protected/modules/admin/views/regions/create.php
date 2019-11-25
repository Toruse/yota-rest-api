<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Regions');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','Regions')=>array('index'),
    Yii::t('modules_admin','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Regions'), 'url'=>array('index')),
	//array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','Create');?> <?php echo Yii::t('modules_admin','Regions');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>