<?php
/* @var $this ExtraPropertiesController */
/* @var $data ExtraProperties */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_extra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_extra), array('view', 'id'=>$data->id_extra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_property')); ?>:</b>
	<?php echo CHtml::encode($data->id_property); ?>
	<br />


</div>