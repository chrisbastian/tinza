<?php
/* @var $this IdentificationController */
/* @var $model Identification */

$this->breadcrumbs=array(
	'Identifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Identification', 'url'=>array('index')),
	array('label'=>'Create Identification', 'url'=>array('create')),
	array('label'=>'Update Identification', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Identification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Identification', 'url'=>array('admin')),
);
?>

<h1>View Identification #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_at',
		'updated_at',
		'id_propertie',
		'id_use_ground',
		'soil_date_expedition',
		'soil_date_expiration',
		'document_identification',
	),
)); ?>
