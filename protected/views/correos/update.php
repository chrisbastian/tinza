<?php
/* @var $this CorreosController */
/* @var $model Correos */

$this->breadcrumbs=array(
	'Correoses'=>array('index'),
	$model->id_correo=>array('view','id'=>$model->id_correo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Correos', 'url'=>array('index')),
	array('label'=>'Create Correos', 'url'=>array('create')),
	array('label'=>'View Correos', 'url'=>array('view', 'id'=>$model->id_correo)),
	array('label'=>'Manage Correos', 'url'=>array('admin')),
);
?>

<h1>Update Correos <?php echo $model->id_correo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>