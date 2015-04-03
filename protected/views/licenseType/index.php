<?php
/* @var $this LicenseTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'License Types',
);

$this->menu=array(
	array('label'=>'Create LicenseType', 'url'=>array('create')),
	array('label'=>'Manage LicenseType', 'url'=>array('admin')),
);
?>

<h1>License Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
