<?php
/* @var $this UseSoilTypeController */
/* @var $model UseSoilType */

$this->breadcrumbs=array(
	'Use Soil Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UseSoilType', 'url'=>array('index')),
	array('label'=>'Create UseSoilType', 'url'=>array('create')),
	array('label'=>'Update UseSoilType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UseSoilType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UseSoilType', 'url'=>array('admin')),
);
?>

<h1>View UseSoilType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'use_soil_type',
	),
)); ?>
