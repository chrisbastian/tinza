<?php
/* @var $this ExtraPropertiesController */
/* @var $model ExtraProperties */

$this->breadcrumbs=array(
	'Extra Properties'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ExtraProperties', 'url'=>array('index')),
	array('label'=>'Create ExtraProperties', 'url'=>array('create')),
	array('label'=>'Update ExtraProperties', 'url'=>array('update', 'id'=>$model->id_extra)),
	array('label'=>'Delete ExtraProperties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_extra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExtraProperties', 'url'=>array('admin')),
);
?>

<h1>View ExtraProperties #<?php echo $model->id_extra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_extra',
		'title',
		'description',
		'id_property',
	),
)); ?>
