<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_region'); ?>
		<?php echo $form->textField($model,'id_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package_volume'); ?>
		<?php echo $form->textField($model,'package_volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'launch_date'); ?>
		<?php echo $form->textField($model,'launch_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'close_date'); ?>
		<?php echo $form->textField($model,'close_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sms'); ?>
		<?php echo $form->textField($model,'sms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sms_active'); ?>
		<?php echo $form->textField($model,'sms_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton( Yii::t('modules_admin','Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->