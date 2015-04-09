<?php
/* @var $this SolictudesController */
/* @var $model Solictudes */

$this->breadcrumbs=array(
	'Solictudes'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'List Solictudes', 'url'=>array('index')),
	array('label'=>'Create Solictudes', 'url'=>array('create')),
	array('label'=>'Update Solictudes', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Delete Solictudes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solictudes', 'url'=>array('admin')),
);
?>

<h1>View Solictudes #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitud',
		'id_usuario',
	),
)); ?>
