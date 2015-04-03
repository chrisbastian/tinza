<?php
/* @var $this LicenseTypeController */
/* @var $data LicenseType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('license_type')); ?>:</b>
	<?php echo CHtml::encode($data->license_type); ?>
	<br />


</div>