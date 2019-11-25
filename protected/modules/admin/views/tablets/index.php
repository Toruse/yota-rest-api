<?php
/* @var $this TabletsController */
/* @var $model Tablets */

$this->pageTitle=Yii::app()->name.' - '.Yii::t('modules_admin','For tablets');

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin')=>array('/admin'),
    Yii::t('modules_admin','For tablets'),
);

$this->menu=array(
    array('label'=>Yii::t('modules_admin','List').' '.Yii::t('modules_admin','Tariffs'), 'url'=>array('index')),
    array('label'=>Yii::t('modules_admin','Create').' '.Yii::t('modules_admin','Tariff'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tablets-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('modules_admin','For tablets');?></h1>

<p>
    <?php echo Yii::t('modules_admin','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php echo CHtml::link(Yii::t('modules_admin','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'tablets-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        array(
            'name'=>'id_region',
            'value'=>function ($model){
                return $model->idRegion->name;
            },
            'filter'=>CHtml::listData(Regions::model()->findAll(),'id','name')
        ),
        //'name',
        'day',
        'month',
        'year',
        /*
        'active',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
