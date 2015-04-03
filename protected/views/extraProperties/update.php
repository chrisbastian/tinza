<?php
/* @var $this ExtraPropertiesController */
/* @var $model ExtraProperties */

$this->breadcrumbs=array(
	'Extra Properties'=>array('index'),
	$model->title=>array('view','id'=>$model->id_extra),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExtraProperties', 'url'=>array('index')),
	array('label'=>'Create ExtraProperties', 'url'=>array('create')),
	array('label'=>'View ExtraProperties', 'url'=>array('view', 'id'=>$model->id_extra)),
	array('label'=>'Manage ExtraProperties', 'url'=>array('admin')),
);
?>

<h1>Update ExtraProperties <?php echo $model->id_extra; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>