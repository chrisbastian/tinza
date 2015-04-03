<?php
/* @var $this LicenseTypeController */
/* @var $model LicenseType */

$this->breadcrumbs=array(
	'License Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LicenseType', 'url'=>array('index')),
	array('label'=>'Create LicenseType', 'url'=>array('create')),
	array('label'=>'Update LicenseType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LicenseType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LicenseType', 'url'=>array('admin')),
);
?>

<h1>View LicenseType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'license_type',
	),
)); ?>
