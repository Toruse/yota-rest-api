<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
    Yii::t('modules_admin','Admin'),
);

$this->menu=array(
    array('label'=> Yii::t('modules_admin','Regions'), 'url'=>array('/admin/regions/index')),
    array('label'=> Yii::t('modules_admin','For phones'), 'url'=>array('/admin/phones/index')),
    array('label'=> Yii::t('modules_admin','For tablets'), 'url'=>array('/admin/tablets/index')),
    array('label'=> Yii::t('modules_admin','For desktops'), 'url'=>array('/admin/desktops/index')),
);

?>
<h1><?php echo Yii::t('modules_admin','Admin'); ?></h1>

<p>
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget();
    ?>
</p>