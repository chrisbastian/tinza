<?php
/* @var $this IdentificationController */
/* @var $model Identification */

$this->breadcrumbs=array(
	'Identifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Identification', 'url'=>array('index')),
	array('label'=>'Manage Identification', 'url'=>array('admin')),
);
?>

<h1>Create Identification</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>