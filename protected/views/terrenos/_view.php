<?php
/* @var $this TerrenosController */
/* @var $data Terrenos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_terreno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_terreno), array('view', 'id'=>$data->id_terreno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen1')); ?>:</b>
	<?php echo CHtml::encode($data->imagen1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen2')); ?>:</b>
	<?php echo CHtml::encode($data->imagen2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen3')); ?>:</b>
	<?php echo CHtml::encode($data->imagen3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen4')); ?>:</b>
	<?php echo CHtml::encode($data->imagen4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen5')); ?>:</b>
	<?php echo CHtml::encode($data->imagen5); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen6')); ?>:</b>
	<?php echo CHtml::encode($data->imagen6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metros_cuadrados')); ?>:</b>
	<?php echo CHtml::encode($data->metros_cuadrados); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comuna')); ?>:</b>
	<?php echo CHtml::encode($data->comuna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendedor); ?>
	<br />

	*/ ?>

</div>