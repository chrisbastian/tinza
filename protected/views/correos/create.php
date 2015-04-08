<?php
/* @var $this CorreosController */
/* @var $model Correos */

$this->breadcrumbs=array(
	'Correoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Correos', 'url'=>array('index')),
	array('label'=>'Manage Correos', 'url'=>array('admin')),
);
?>

<h1>Create Correos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>