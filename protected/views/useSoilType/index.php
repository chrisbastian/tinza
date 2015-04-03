<?php
/* @var $this UseSoilTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Use Soil Types',
);

$this->menu=array(
	array('label'=>'Create UseSoilType', 'url'=>array('create')),
	array('label'=>'Manage UseSoilType', 'url'=>array('admin')),
);
?>

<h1>Use Soil Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
