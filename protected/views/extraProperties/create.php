<?php
/* @var $this ExtraPropertiesController */
/* @var $model ExtraProperties */

$this->breadcrumbs=array(
	'Extra Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExtraProperties', 'url'=>array('index')),
	array('label'=>'Manage ExtraProperties', 'url'=>array('admin')),
);
?>

<h1>Create ExtraProperties</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>