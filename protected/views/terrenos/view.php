<?php
/* @var $this TerrenosController */
/* @var $model Terrenos */

$this->breadcrumbs=array(
	'Terrenoses'=>array('index'),
	$model->id_terreno,
);

$this->menu=array(
	array('label'=>'List Terrenos', 'url'=>array('index')),
	array('label'=>'Create Terrenos', 'url'=>array('create')),
	array('label'=>'Update Terrenos', 'url'=>array('update', 'id'=>$model->id_terreno)),
	array('label'=>'Delete Terrenos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_terreno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Terrenos', 'url'=>array('admin')),
);
?>

<h1>View Terrenos #<?php echo $model->id_terreno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_terreno',
		'titulo',
		'imagen1',
		'imagen2',
		'imagen3',
		'imagen4',
		'imagen5',
		'imagen6',
		'precio',
		'metros_cuadrados',
		'region',
		'ciudad',
		'comuna',
		'descripcion',
		'id_vendedor',
	),
)); ?>
