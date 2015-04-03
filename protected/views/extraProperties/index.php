<?php
/* @var $this ExtraPropertiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Extra Properties',
);

$this->menu=array(
	array('label'=>'Create ExtraProperties', 'url'=>array('create')),
	array('label'=>'Manage ExtraProperties', 'url'=>array('admin')),
);
?>

<h1>Extra Properties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
