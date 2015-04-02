<?php
/* @var $this TerrenosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Terrenoses',
);

$this->menu=array(
	array('label'=>'Create Terrenos', 'url'=>array('create')),
	array('label'=>'Manage Terrenos', 'url'=>array('admin')),
);
?>

<h1>Terrenoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
