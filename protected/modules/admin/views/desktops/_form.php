<?php
/* @var $this DesktopsController */
/* @var $model Desktops */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'desktops-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note"><?php echo Yii::t('modules_admin','Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_region'); ?>
        <?php echo $form->dropDownList($model,'id_region',CHtml::listData(Regions::model()->findAll(),'id','name')); ?>
        <?php echo $form->error($model,'id_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period'); ?>
        <?php echo $form->dropDownList($model,'period',Desktops::getListPeriod()); ?>
        <?php echo $form->error($model,'period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speed'); ?>
		<?php echo $form->textField($model,'speed',array('size'=>60,'maxlength'=>255)); ?>
        <span class="required"><?php echo Yii::t('modules_admin','The field may be set to <b>maximum</b>.<br> If an empty field set the value of <b>maximum</b>');?></span>
		<?php echo $form->error($model,'speed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
        <?php echo $form->checkBox($model,'active'); ?>
        <?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('modules_admin','Create') : Yii::t('modules_admin','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->