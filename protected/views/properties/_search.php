<?php
/* @var $this PropertiesController */
/* @var $model Properties */
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
		<?php echo $form->label($model,'id_profile'); ?>
		<?php echo $form->textField($model,'id_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'catastral'); ?>
		<?php echo $form->textField($model,'catastral',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_building'); ?>
		<?php echo $form->textField($model,'is_building'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_ext'); ?>
		<?php echo $form->textField($model,'number_ext',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_int'); ?>
		<?php echo $form->textField($model,'number_int',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'neighborhood'); ?>
		<?php echo $form->textField($model,'neighborhood',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_state'); ?>
		<?php echo $form->textField($model,'id_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cos'); ?>
		<?php echo $form->textField($model,'cos',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cus'); ?>
		<?php echo $form->textField($model,'cus',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cas'); ?>
		<?php echo $form->textField($model,'cas',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'slope'); ?>
		<?php echo $form->textField($model,'slope',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'surface'); ?>
		<?php echo $form->textField($model,'surface'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remetimiento_forntal'); ?>
		<?php echo $form->textField($model,'remetimiento_forntal',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remetimiento_posterior'); ?>
		<?php echo $form->textField($model,'remetimiento_posterior',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remetimiento_izquierdo'); ?>
		<?php echo $form->textField($model,'remetimiento_izquierdo',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remetimiento_derecho'); ?>
		<?php echo $form->textField($model,'remetimiento_derecho',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_parking'); ?>
		<?php echo $form->textField($model,'has_parking'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parking_description'); ?>
		<?php echo $form->textField($model,'parking_description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_parking_document'); ?>
		<?php echo $form->textField($model,'id_parking_document',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_urban_incorporation'); ?>
		<?php echo $form->textField($model,'has_urban_incorporation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urban_incorporation_description'); ?>
		<?php echo $form->textField($model,'urban_incorporation_description',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urban_height_limit'); ?>
		<?php echo $form->textField($model,'urban_height_limit',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->