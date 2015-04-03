<?php
/* @var $this LicenseTypeController */
/* @var $model LicenseType */

$this->breadcrumbs=array(
	'License Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LicenseType', 'url'=>array('index')),
	array('label'=>'Create LicenseType', 'url'=>array('create')),
	array('label'=>'View LicenseType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LicenseType', 'url'=>array('admin')),
);
?>

<h1>Update LicenseType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>