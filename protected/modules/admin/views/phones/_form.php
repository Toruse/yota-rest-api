<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phones-form',
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
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package_volume'); ?>
		<?php echo $form->textField($model,'package_volume'); ?>
		<?php echo $form->error($model,'package_volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'launch_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'name'=>'date',
            'model'=>$model,
            'attribute'=>'launch_date',
            'language'=>'ru',
            'options'=>array(
                'showAnim'=>'slide',
                'dateFormat'=>'dd.mm.yy',
                'changeMonth' => true,
                'changeYear' => true
            ),
        ));?>
		<?php echo $form->error($model,'launch_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'close_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'name'=>'date',
            'model'=>$model,
            'attribute'=>'close_date',
            'language'=>'ru',
            'options'=>array(
                'showAnim'=>'slide',
                'dateFormat'=>'dd.mm.yy',
                'changeMonth' => true,
                'changeYear' => true
            ),
        ));?>
		<?php echo $form->error($model,'close_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms'); ?>
		<?php echo $form->textField($model,'sms'); ?>
		<?php echo $form->error($model,'sms'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'traffic'); ?>
        <?php echo $form->textField($model,'traffic'); ?>
        <?php echo $form->error($model,'traffic'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'unlimited_apps'); ?>
        <?php echo $form->textField($model,'unlimited_apps'); ?>
        <?php echo $form->error($model,'unlimited_apps'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'sms_active'); ?>
        <?php echo $form->checkBox($model,'sms_active',array('checked'=>'checked')); ?>
		<?php echo $form->error($model,'sms_active'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'active'); ?>
        <?php echo $form->dropDownList($model,'active',Phones::getListStatus()); ?>
        <?php echo $form->error($model,'active'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('modules_admin','Create') : Yii::t('modules_admin','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->