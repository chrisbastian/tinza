<?php
/* @var $this IdentificationController */
/* @var $model Identification */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_propertie'); ?>
		<?php echo $form->textField($model,'id_propertie',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_use_ground'); ?>
		<?php echo $form->textField($model,'id_use_ground'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'soil_date_expedition'); ?>
		<?php echo $form->textField($model,'soil_date_expedition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'soil_date_expiration'); ?>
		<?php echo $form->textField($model,'soil_date_expiration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'document_identification'); ?>
		<?php echo $form->textField($model,'document_identification',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->