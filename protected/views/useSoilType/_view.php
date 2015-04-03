<?php
/* @var $this UseSoilTypeController */
/* @var $data UseSoilType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_soil_type')); ?>:</b>
	<?php echo CHtml::encode($data->use_soil_type); ?>
	<br />


</div>