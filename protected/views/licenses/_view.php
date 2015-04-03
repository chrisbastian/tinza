<?php
/* @var $this LicensesController */
/* @var $data Licenses */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_propertie')); ?>:</b>
	<?php echo CHtml::encode($data->id_propertie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_license')); ?>:</b>
	<?php echo CHtml::encode($data->type_license); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lic_date_expedition')); ?>:</b>
	<?php echo CHtml::encode($data->lic_date_expedition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lic_date_expiration')); ?>:</b>
	<?php echo CHtml::encode($data->lic_date_expiration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_document')); ?>:</b>
	<?php echo CHtml::encode($data->id_document); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>