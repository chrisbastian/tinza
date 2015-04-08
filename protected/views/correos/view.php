<?php
/* @var $this CorreosController */
/* @var $model Correos */

$this->breadcrumbs=array(
	'Correoses'=>array('index'),
	$model->id_correo,
);

$this->menu=array(
	array('label'=>'List Correos', 'url'=>array('index')),
	array('label'=>'Create Correos', 'url'=>array('create')),
	array('label'=>'Update Correos', 'url'=>array('update', 'id'=>$model->id_correo)),
	array('label'=>'Delete Correos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_correo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Correos', 'url'=>array('admin')),
);
?>

<h1>View Correos #<?php echo $model->id_correo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_correo',
		'id_user',
		'de',
		'bcc',
		'titulo',
		'descripcion',
	),
)); ?>
