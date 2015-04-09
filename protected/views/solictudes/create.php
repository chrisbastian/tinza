<?php
/* @var $this SolictudesController */
/* @var $model Solictudes */

$this->breadcrumbs=array(
	'Solictudes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solictudes', 'url'=>array('index')),
	array('label'=>'Manage Solictudes', 'url'=>array('admin')),
);
?>

<h1>Create Solictudes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>