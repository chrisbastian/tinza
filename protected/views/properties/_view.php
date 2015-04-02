<?php
/* @var $this PropertiesController */
/* @var $data Properties */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_profile')); ?>:</b>
	<?php echo CHtml::encode($data->id_profile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catastral')); ?>:</b>
	<?php echo CHtml::encode($data->catastral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_building')); ?>:</b>
	<?php echo CHtml::encode($data->is_building); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_ext')); ?>:</b>
	<?php echo CHtml::encode($data->number_ext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_int')); ?>:</b>
	<?php echo CHtml::encode($data->number_int); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('neighborhood')); ?>:</b>
	<?php echo CHtml::encode($data->neighborhood); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_state')); ?>:</b>
	<?php echo CHtml::encode($data->id_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::encode($data->id_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cos')); ?>:</b>
	<?php echo CHtml::encode($data->cos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus')); ?>:</b>
	<?php echo CHtml::encode($data->cus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cas')); ?>:</b>
	<?php echo CHtml::encode($data->cas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slope')); ?>:</b>
	<?php echo CHtml::encode($data->slope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surface')); ?>:</b>
	<?php echo CHtml::encode($data->surface); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remetimiento_forntal')); ?>:</b>
	<?php echo CHtml::encode($data->remetimiento_forntal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remetimiento_posterior')); ?>:</b>
	<?php echo CHtml::encode($data->remetimiento_posterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remetimiento_izquierdo')); ?>:</b>
	<?php echo CHtml::encode($data->remetimiento_izquierdo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remetimiento_derecho')); ?>:</b>
	<?php echo CHtml::encode($data->remetimiento_derecho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_parking')); ?>:</b>
	<?php echo CHtml::encode($data->has_parking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parking_description')); ?>:</b>
	<?php echo CHtml::encode($data->parking_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parking_document')); ?>:</b>
	<?php echo CHtml::encode($data->id_parking_document); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_urban_incorporation')); ?>:</b>
	<?php echo CHtml::encode($data->has_urban_incorporation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urban_incorporation_description')); ?>:</b>
	<?php echo CHtml::encode($data->urban_incorporation_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urban_height_limit')); ?>:</b>
	<?php echo CHtml::encode($data->urban_height_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>