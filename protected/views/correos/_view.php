<?php
/* @var $this CorreosController */
/* @var $data Correos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_correo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_correo), array('view', 'id'=>$data->id_correo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('de')); ?>:</b>
	<?php echo CHtml::encode($data->de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bcc')); ?>:</b>
	<?php echo CHtml::encode($data->bcc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>