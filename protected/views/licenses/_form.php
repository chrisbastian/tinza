<?php
/* @var $this LicensesController */
/* @var $model Licenses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'licenses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_propertie'); ?>
		<?php echo $form->textField($model,'id_propertie',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_propertie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_license'); ?>
		<?php echo $form->textField($model,'type_license',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'type_license'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lic_date_expedition'); ?>
		<?php echo $form->textField($model,'lic_date_expedition'); ?>
		<?php echo $form->error($model,'lic_date_expedition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lic_date_expiration'); ?>
		<?php echo $form->textField($model,'lic_date_expiration'); ?>
		<?php echo $form->error($model,'lic_date_expiration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_document'); ?>
		<?php echo $form->textField($model,'id_document',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'id_document'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->