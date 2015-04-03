<?php
/* @var $this UseSoilTypeController */
/* @var $model UseSoilType */

$this->breadcrumbs=array(
	'Use Soil Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UseSoilType', 'url'=>array('index')),
	array('label'=>'Manage UseSoilType', 'url'=>array('admin')),
);
?>

<h1>Create UseSoilType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>