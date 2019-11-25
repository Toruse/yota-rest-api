<?php
/* @var $this TabletsController */
/* @var $model Tablets */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Tariff');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','For tablets')=>array('index'),
    Yii::t('modules_admin','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Tariffs'), 'url'=>array('index')),
//	array('label'=>'Manage Tablets', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Tariff');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>