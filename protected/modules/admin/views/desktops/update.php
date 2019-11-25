<?php
/* @var $this DesktopsController */
/* @var $model Desktops */
$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','Update').' '.Yii::t('modules_admin','Tariff');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','For desktops')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
    Yii::t('modules_admin','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Tariffs'), 'url'=>array('index')),
	array('label'=>Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Tariff'), 'url'=>array('create')),
	array('label'=>Yii::t('modules_admin','View').' '.Yii::t('modules_admin','Tariff'), 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Desktops', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('modules_admin','Update').' '.Yii::t('modules_admin','Tariff');?> <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>