<?php
/* @var $this LicensesController */
/* @var $model Licenses */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Licenses', 'url'=>array('index')),
	array('label'=>'Create Licenses', 'url'=>array('create')),
	array('label'=>'Update Licenses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Licenses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Licenses', 'url'=>array('admin')),
);
?>

<h1>View Licenses #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_propertie',
		'type_license',
		'lic_date_expedition',
		'lic_date_expiration',
		'id_document',
		'created_at',
		'updated_at',
	),
)); ?>
