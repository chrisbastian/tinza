<?php
/* @var $this SolictudesController */
/* @var $model Solictudes */

$this->breadcrumbs=array(
	'Solictudes'=>array('index'),
	$model->id_solicitud=>array('view','id'=>$model->id_solicitud),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solictudes', 'url'=>array('index')),
	array('label'=>'Create Solictudes', 'url'=>array('create')),
	array('label'=>'View Solictudes', 'url'=>array('view', 'id'=>$model->id_solicitud)),
	array('label'=>'Manage Solictudes', 'url'=>array('admin')),
);
?>

<h1>Update Solictudes <?php echo $model->id_solicitud; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>