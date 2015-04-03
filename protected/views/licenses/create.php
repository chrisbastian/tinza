<?php
/* @var $this LicensesController */
/* @var $model Licenses */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Licenses', 'url'=>array('index')),
	array('label'=>'Manage Licenses', 'url'=>array('admin')),
);
?>

<h1>Create Licenses</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>