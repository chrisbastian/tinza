<?php
/* @var $this UseSoilTypeController */
/* @var $model UseSoilType */

$this->breadcrumbs=array(
	'Use Soil Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UseSoilType', 'url'=>array('index')),
	array('label'=>'Create UseSoilType', 'url'=>array('create')),
	array('label'=>'View UseSoilType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UseSoilType', 'url'=>array('admin')),
);
?>

<h1>Update UseSoilType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>