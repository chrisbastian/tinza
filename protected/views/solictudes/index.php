<?php
/* @var $this SolictudesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solictudes',
);

$this->menu=array(
	array('label'=>'Create Solictudes', 'url'=>array('create')),
	array('label'=>'Manage Solictudes', 'url'=>array('admin')),
);
?>

<h1>Solictudes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
