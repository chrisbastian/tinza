<?php
/* @var $this PropertiesController */
/* @var $model Properties */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Properties', 'url'=>array('index')),
	array('label'=>'Create Properties', 'url'=>array('create')),
	array('label'=>'Update Properties', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Properties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Properties', 'url'=>array('admin')),
);
?>

<h1>View Properties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_profile',
		'catastral',
		'is_building',
		'street',
		'number_ext',
		'number_int',
		'neighborhood',
		'zip_code',
		'id_state',
		'id_city',
		'latitude',
		'longitude',
		'cos',
		'cus',
		'cas',
		'slope',
		'surface',
		'remetimiento_forntal',
		'remetimiento_posterior',
		'remetimiento_izquierdo',
		'remetimiento_derecho',
		'has_parking',
		'parking_description',
		'id_parking_document',
		'has_urban_incorporation',
		'urban_incorporation_description',
		'urban_height_limit',
		'created_at',
		'updated_at',
	),
)); ?>
