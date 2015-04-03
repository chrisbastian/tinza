<?php
/* @var $this LicensesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Licenses',
);

$this->menu=array(
	array('label'=>'Create Licenses', 'url'=>array('create')),
	array('label'=>'Manage Licenses', 'url'=>array('admin')),
);
?>

<h1>Licenses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
