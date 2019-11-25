<?php
/* @var $this PhonesController */
/* @var $data Phones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_region')); ?>:</b>
	<?php echo CHtml::encode($data->id_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_volume')); ?>:</b>
	<?php echo CHtml::encode($data->package_volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('launch_date')); ?>:</b>
	<?php echo CHtml::encode($data->launch_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('close_date')); ?>:</b>
	<?php echo CHtml::encode($data->close_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sms')); ?>:</b>
	<?php echo CHtml::encode($data->sms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sms_active')); ?>:</b>
	<?php echo CHtml::encode($data->sms_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>