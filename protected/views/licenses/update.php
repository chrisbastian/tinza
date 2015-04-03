<?php
/* @var $this LicensesController */
/* @var $model Licenses */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Licenses', 'url'=>array('index')),
	array('label'=>'Create Licenses', 'url'=>array('create')),
	array('label'=>'View Licenses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Licenses', 'url'=>array('admin')),
);
?>

<h1>Update Licenses <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>