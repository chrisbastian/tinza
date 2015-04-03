<?php
/* @var $this IdentificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Identifications',
);

$this->menu=array(
	array('label'=>'Create Identification', 'url'=>array('create')),
	array('label'=>'Manage Identification', 'url'=>array('admin')),
);
?>

<h1>Identifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
