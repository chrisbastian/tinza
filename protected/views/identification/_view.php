<?php
/* @var $this IdentificationController */
/* @var $data Identification */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propertie')); ?>:</b>
	<?php echo CHtml::encode($data->id_propertie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_use_ground')); ?>:</b>
	<?php echo CHtml::encode($data->id_use_ground); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soil_date_expedition')); ?>:</b>
	<?php echo CHtml::encode($data->soil_date_expedition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soil_date_expiration')); ?>:</b>
	<?php echo CHtml::encode($data->soil_date_expiration); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('document_identification')); ?>:</b>
	<?php echo CHtml::encode($data->document_identification); ?>
	<br />

	*/ ?>

</div>