<?php
/* @var $this IdentificationController */
/* @var $model Identification */

$this->breadcrumbs=array(
	'Identifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Identification', 'url'=>array('index')),
	array('label'=>'Create Identification', 'url'=>array('create')),
	array('label'=>'View Identification', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Identification', 'url'=>array('admin')),
);
?>

<h1>Update Identification <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>