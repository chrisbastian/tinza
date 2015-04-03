<?php
/* @var $this LicenseTypeController */
/* @var $model LicenseType */

$this->breadcrumbs=array(
	'License Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LicenseType', 'url'=>array('index')),
	array('label'=>'Manage LicenseType', 'url'=>array('admin')),
);
?>

<h1>Create LicenseType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>